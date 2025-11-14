<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct(
        private CartService $cartService
    ) {}

    public function index()
    {
        $cart = $this->cartService->getCart();
        $cart->load(['items.product.images']);

        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        try {
            $product = Product::findOrFail($request->product_id);
            $this->cartService->addItem($product, $request->quantity);

            return redirect()->route('cart.index')
                ->with('success', 'Producto agregado al carrito');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, CartItem $item)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        try {
            $this->cartService->updateItem($item, $request->quantity);

            return redirect()->route('cart.index')
                ->with('success', 'Carrito actualizado');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function remove(CartItem $item)
    {
        $this->cartService->removeItem($item);

        return redirect()->route('cart.index')
            ->with('success', 'Producto eliminado del carrito');
    }

    public function clear()
    {
        $this->cartService->clearCart();

        return redirect()->route('cart.index')
            ->with('success', 'Carrito vaciado');
    }
}

