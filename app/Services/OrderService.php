<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Http\Requests\Account\CheckoutStoreRequest;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Exception;

class OrderService
{
    public static function register(array $checkoutData) : void
    {
        $cartItems = CartService::getItemWithDetails();
        $productTotalPrice = totalAllProductPrice();
        $cartCount = CartService::cartItemCount();
        foreach ($cartItems as $cartItem) {
            if ($cartItem['qty'] > $cartItem['product']['qty']){
                throw new Exception('محصول مورد نظر وجود ندارد ');
            }
        }
        foreach ($cartItems as $cartItem) {
            $cartItem['product']->decrement('qty',$cartItem['qty']);
        }

        $userOrder = [
            'user_id'=>Auth::id(),
            'user_province'=>$checkoutData['province'],
            'user_city'=>$checkoutData['city'],
            'final_price'=>$productTotalPrice,
            'user_address'=>$checkoutData['user_address'],
            'total_products'=>$cartCount,
            'user_postal_code'=>$checkoutData['postal_code'],
            'tracing_code'=>\Illuminate\Support\Str::random(12),
            'user_phone'=>$checkoutData['phone'],
            'status'=>OrderStatus::PROCESSING
        ];

        $order = Order::create(array_merge($userOrder));
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem['product_id'],
                'qty' => $cartItem['qty'],
                'unit_price' => $cartItem['product']['price'],
                'total_price' => $cartItem['product']['price'] * $cartItem['qty'],
                'unit_discount' => $cartItem['product']['discount'],
                'total_discount' => $cartItem['product']['discount'] * $cartItem['qty'],
            ]);
        }
    }
}

