<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatus;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController
{
    public function index()
    {
        $withoutSlider = true;
        $products = Product::query()
            ->applyFilter()
            ->applySort()
            ->where('status','=',ProductStatus::PUBLISHED)
            ->paginate()
            ->withQueryString();
        $productCategories = ProductCategory::get();
        return view('product.index',compact('withoutSlider','products','productCategories'));
    }

    public function removeFilter()
    {
        $request = request()->query();
        unset($request['category_id']);
        unset($request['exists']);
        return redirect()->route('product.index',$request);
    }

    public function show(Product $product)
    {
        $product->load('productCategory');
        $productCategory = Product::all();
        $productCategory->load('productCategory');
//        dd(
//            $productCategory->toArray()
//        );
        $withoutSlider = true;
        return view('product.layouts.show',compact('withoutSlider','product','productCategory'));
    }

//    public function search(Request $request)
//    {
//        $products = Product::whereAny(['name','en_name','description'],'like','%'.$request->search.'%')
//            ->take(5)
//            ->get();
//        dd(response()->json($products));
//        return response()->json($products);
//    }
}
