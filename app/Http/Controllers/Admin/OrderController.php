<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController
{
    public function index()
    {
        $orders = Order::with('user')
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

    public function edit($userId)
    {
        $user = User::query()
            ->where('id','=',$userId)
            ->first();
        return view('admin.orders.edit',compact('user'));
    }

    public function update(UserUpdateRequest $request , $userId)
    {
        $user = User::query()
            ->where('id','=',$userId)
            ->first();
        $input = $request->validated();
        if ($input['password']) {
            if (!Hash::check($input['password'], $user['password'])) {
                $inputs['password'] = Hash::make($input['password']);
            }
        }else{
            unset($input['password']);
        }
        $user->fill($input);
        if (!$user->isDirty()) {
            return back();
        }
        $user->update($input);
        return redirect()->back();
    }

    public function delete($userId)
    {
        User::query()
            ->where('id','=',$userId)
            ->delete();
        return redirect()->back()->withErrors('delete', 'کاربر حذف شد');
    }
}
