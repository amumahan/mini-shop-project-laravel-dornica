<?php

namespace App\Services;

use Illuminate\Http\Request;

class CartService
{
    public static function add(int $productId , int $qty):void
    {
        $userCart = self::getItem();
        $userCart[$productId] = [
            'product_id'=>$productId,
            'qty'=>$qty
        ];
        session([
            'cart'=>$userCart
        ]);
    }

    public static function getItem():array
    {
        return session('cart',[]);
    }
}
