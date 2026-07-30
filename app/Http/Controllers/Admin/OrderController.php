<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\OrderUpdateRequest;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController
{
    public function index()
    {
        $orders = Order::with('user')
            ->applySearch()
            ->applySort()
            ->get();
        return view('admin.orders.index' , compact('orders'));
    }

    public function show($orderId)
    {
        $orderDetails = Order::query()
            ->where('id','=',$orderId)
            ->with('user')
            ->first();
        $orderItems = OrderItem::query()
            ->where('id','=',$orderId)
            ->with('product')
            ->with('order')
            ->get();
        return view('admin.orders.show' , compact('orderDetails' , 'orderItems'));
    }

    public function edit($orderId)
    {
        $order = Order::query()
            ->where('id','=',$orderId)
            ->first();
        return view('admin.orders.edit',compact('order'));
    }

    public function update(OrderUpdateRequest $request , $orderId)
    {
//        dd(
//            $request->all()
//        );
        $input = $request->validated();
        $order = Order::query()
            ->where('id','=',$orderId)
            ->first();
        $order->update($input);
        return redirect()->back();
    }

    public function delete($orderId)
    {
        Order::query()
            ->where('id','=',$orderId)
            ->delete();
        return redirect()->back()->withErrors('delete', 'سفارش حذف شد');
    }
}
