<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController
{
    public function index()
    {
        $withoutSlider = true;
        $userCart = CartService::getItemWithDetails();
        return view('cart.index',compact('withoutSlider','userCart'));
    }

    public function add(Request $request)
    {
        CartService::add(
            $request->input('product_id'),
            $request->input('qty')
        );
        return redirect()->back();
    }

    public function delete()
    {
        CartService::destroy();
        return redirect()->route('product.cart.index');
    }

    public function update()
    {

    }

    public function remove(Product $product)
    {

            CartService::removeItem($product);
            return redirect()->back();
    }
}
