<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function getCart()
    {
        if (auth()->check()) {
            return Cart::firstOrCreate(['user_id' => auth()->id()]);
        }

        $sessionId = Session::getId();
        return Cart::firstOrCreate(['session_id' => $sessionId]);
    }

    public function addItem(Product $product, int $quantity = 1): CartItem
    {
        if (!$product->hasStock($quantity)) {
            throw new \Exception('Stock insuficiente');
        }

        $cart = $this->getCart();
        
        $cartItem = CartItem::updateOrCreate(
            [
                'cart_id' => $cart->id,
                'product_id' => $product->id,
            ],
            [
                'quantity' => $quantity,
                'price' => $product->price,
            ]
        );

        return $cartItem;
    }

    public function updateItem(CartItem $cartItem, int $quantity): void
    {
        if (!$cartItem->product->hasStock($quantity)) {
            throw new \Exception('Stock insuficiente');
        }

        $cartItem->update(['quantity' => $quantity]);
    }

    public function removeItem(CartItem $cartItem): void
    {
        $cartItem->delete();
    }

    public function clearCart(): void
    {
        $cart = $this->getCart();
        $cart->items()->delete();
    }

    public function migrateSessionCartToUser(int $userId): void
    {
        $sessionId = Session::getId();
        $sessionCart = Cart::where('session_id', $sessionId)->first();

        if ($sessionCart) {
            $userCart = Cart::firstOrCreate(['user_id' => $userId]);
            
            foreach ($sessionCart->items as $item) {
                CartItem::updateOrCreate(
                    [
                        'cart_id' => $userCart->id,
                        'product_id' => $item->product_id,
                    ],
                    [
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                    ]
                );
            }

            $sessionCart->delete();
        }
    }
}

