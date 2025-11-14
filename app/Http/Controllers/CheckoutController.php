<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct(
        private CartService $cartService,
        private OrderService $orderService
    ) {}

    public function index()
    {
        $cart = $this->cartService->getCart();
        $cart->load(['items.product']);

        if ($cart->items->count() === 0) {
            return redirect()->route('cart.index')
                ->with('error', 'Tu carrito está vacío');
        }

        $user = auth()->user();

        return view('checkout.index', compact('cart', 'user'));
    }

    public function store(CheckoutRequest $request)
    {
        $cart = $this->cartService->getCart();
        $cart->load(['items.product']);

        if ($cart->items->count() === 0) {
            return redirect()->route('cart.index')
                ->with('error', 'Tu carrito está vacío');
        }

        // Verificar stock antes de procesar
        foreach ($cart->items as $item) {
            if (!$item->product->hasStock($item->quantity)) {
                return redirect()->route('cart.index')
                    ->with('error', "El producto {$item->product->name} no tiene stock suficiente");
            }
        }

        try {
            $order = $this->orderService->createOrder($request->validated(), $cart);

            return redirect()->route('orders.show', $order)
                ->with('success', 'Pedido creado exitosamente. Número de pedido: ' . $order->order_number);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al procesar el pedido: ' . $e->getMessage())
                ->withInput();
        }
    }
}

