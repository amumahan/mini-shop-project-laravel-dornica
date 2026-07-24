<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;

class CartService
{
    public static function add(int $productId, int $qty): void
    {
        $userCart = self::getItem();
        $userCart[$productId] = [
            'product_id' => $productId,
            'qty' => $qty,

        ];
        session([
            'cart' => $userCart
        ]);
    }

    public static function getItem(): array
    {
        return session('cart', []);
    }

    public static function getItemWithDetails(): array
    {
        $userCart = self::getItem();
        foreach ($userCart as $key => $value) {
            $userCart[$key]['product'] = Product::find($key);
        }
        return $userCart;
    }

    public static function cartItemCount() :int
    {
        $userCart = self::getItem();
        return count($userCart);
    }

    public static function destroy() :void
    {
        session()->forget('cart');
    }

    public static function removeItem($product) :void
    {
        $cart = self::getItem();
        unset($cart[$product->id]);
        session([
            'cart'=>$cart
        ]);
    }

    public static function productPrice() :int
    {
        $userCart = self::getItemWithDetails();
        $totalProductPrice = 0;
        foreach ($userCart as $productItem) {
            $totalPrice = $productItem['product']['price'] * $productItem['qty'];
            $totalProductPrice += $totalPrice;
        }
        return $totalProductPrice;
    }

    public static function totalPrice() :int
    {
        $userCart = self::getItemWithDetails();
        $discount = 0;
        $price = 0;
        foreach ($userCart as $item) {
            if ($item['product']['discount']) {
                $discount += $item['product']['discount'];
                $price += $item['product']['price'];
            }
        }
        $amountPrice = amountNumber($price,$discount);
        $totalPrice = $price-$amountPrice;
        return $totalPrice;
    }

    public static function update($request) :void
    {
        $qty = $request['qty'];
        $userCart = self::getItem();
        foreach ($qty as $key=>$value) {
            if (isset($userCart[$key])) {
                $userCart[$key]['qty'] = $value;
            }
            session([
                'cart'=>$userCart
            ]);
        }
    }
}
