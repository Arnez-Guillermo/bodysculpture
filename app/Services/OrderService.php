<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Support\Str;

class OrderService
{
    public function __construct(
        private CartService $cartService
    ) {}

    public function createOrder(array $data, Cart $cart): Order
    {
        $orderNumber = $this->generateOrderNumber();
        
        $subtotal = $cart->total;
        $tax = $subtotal * 0.21; // 21% IVA
        $shippingCost = 0; // Por ahora gratis, se puede calcular después
        $total = $subtotal + $tax + $shippingCost;

        $order = Order::create([
            'order_number' => $orderNumber,
            'user_id' => auth()->id(),
            'status' => 'pending',
            'subtotal' => $subtotal,
            'tax' => $tax,
            'shipping_cost' => $shippingCost,
            'total' => $total,
            'customer_name' => $data['name'],
            'customer_email' => $data['email'],
            'customer_phone' => $data['phone'],
            'shipping_address' => $data['address'],
            'shipping_city' => $data['city'],
            'shipping_postal_code' => $data['postal_code'],
            'notes' => $data['notes'] ?? null,
        ]);

        foreach ($cart->items as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_name' => $cartItem->product->name,
                'product_sku' => $cartItem->product->sku,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
                'subtotal' => $cartItem->subtotal,
            ]);

            // Reducir stock
            $cartItem->product->decrement('stock', $cartItem->quantity);
        }

        $this->cartService->clearCart();

        return $order;
    }

    private function generateOrderNumber(): string
    {
        $date = now()->format('Ymd');
        $random = Str::upper(Str::random(4));
        return "ORD-{$date}-{$random}";
    }
}

