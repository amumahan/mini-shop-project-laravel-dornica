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

        return view('cart.index',compact('withoutSlider'));
    }

    public function add(Request $request)
    {
        CartService::add(
            $request->input('product_id'),
            $request->input('qty')
        );
        return redirect()->back();
    }
}
