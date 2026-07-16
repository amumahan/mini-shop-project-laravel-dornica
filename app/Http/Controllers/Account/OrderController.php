<?php

namespace App\Http\Controllers\Account;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController
{
    //
    public function orders()
    {

        $withoutSlider = true;
        $withoutFooter = true;
        $userOrders = Order::query()
            ->where('user_id','=',Auth::id())
            ->with('orderItems.product')
            ->orderByDesc('created_at')
            ->paginate();
        return view('account.orders',compact('withoutSlider','withoutFooter','userOrders'));
    }
}
