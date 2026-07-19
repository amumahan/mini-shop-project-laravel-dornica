<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatus;
use App\Models\Product;

class ProductController
{
    public function index()
    {
        $withoutSlider = true;
        $products = Product::query()
            ->where('status','=',ProductStatus::PUBLISHED)
            ->get();
        return view('product.index',compact('withoutSlider','products'));
    }

    public function show()
    {
        $withoutSlider = true;;
        return view('product.layouts.show',compact('withoutSlider'));
    }
}
