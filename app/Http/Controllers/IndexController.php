<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatus;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Setting;
use Illuminate\Http\Request;

class IndexController
{
    public function index()
    {
        $title = 'صفحه اصلی';
        $products = Product::query()
            ->where('status','=',ProductStatus::PUBLISHED)
            ->orderByDesc('created_at')
            ->paginate();
        $productCategories = ProductCategory::get();
        $bestSellingProduct = Product::withSum('orderItems','qty')
            ->orderByDesc('order_items_sum_qty')
            ->limit(5)
            ->get();
        return view('index',compact('title','products','productCategories','bestSellingProduct'));
    }
}
