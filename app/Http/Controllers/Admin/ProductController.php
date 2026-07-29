<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\OrderUpdateRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController
{
    public function index()
    {
        $products = Product::query()
            ->with('productCategory')
            ->get();
        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }
    public function show($productId)
    {
        $product = Product::query()
            ->where('id','=',$productId)
            ->with('productCategory')
        ->first();
        return view('admin.product.show' , compact('product'));
    }

    public function edit($productId)
    {
        $order = Order::query()
            ->where('id','=',$productId)
            ->first();
        return view('admin.product.edit',compact('order'));
    }

    public function update(OrderUpdateRequest $request , $productId)
    {
//        dd(
//            $request->all()
//        );
        $input = $request->validated();
        $product = Order::query()
            ->where('id','=',$productId)
            ->first();
        $product->update($input);
        return redirect()->back();
    }

    public function delete($productId)
    {
        Order::query()
            ->where('id','=',$productId)
            ->delete();
        return redirect()->back()->withErrors('delete', 'سفارش حذف شد');
    }

}
