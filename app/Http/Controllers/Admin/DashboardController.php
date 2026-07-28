<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatus;
use App\Enums\UserStatus;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    //
    public function dashboard()
    {
        $startOfMonth = Carbon::now()->toJalali()->startMonth()->toCarbon();
        $endOfMonth = Carbon::now();
        $product = Product::query()
            ->whereBetween('created_at',[$startOfMonth,$endOfMonth])
            ->has('orderItems')
            ->get();
        $order = Order::query()
            ->whereBetween('created_at',[$startOfMonth,$endOfMonth])
            ->where('status','=',OrderStatus::DELIVERED)
            ->get();
        $user = User::query()
            ->whereBetween('created_at',[$startOfMonth,$endOfMonth])
            ->where('status','=',UserStatus::ACTIVE)
            ->get();
        $category = ProductCategory::query()
            ->whereBetween('created_at',[$startOfMonth,$endOfMonth])
            ->Has('products')
            ->get();
        return view('admin.dashboard',compact('product','order','user','category'));
    }
}
