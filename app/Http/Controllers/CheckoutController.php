<?php

namespace App\Http\Controllers;

use App\Http\Requests\Account\CheckoutStoreRequest;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class CheckoutController
{
    //
    public function index()
    {
        $withoutSlider = true;
        $title = 'ثبت سفارش';
        $userCart = CartService::getItemWithDetails();
        return view('checkout.index',compact('withoutSlider','userCart','title'));
    }

    public function store(CheckoutStoreRequest $request)
    {
        $request->validated();
        $checkoutData = $request->only([

            'province',
            'city',
            'user_address',
            'postal_code',
            'phone'
        ]);
        try {
            OrderService::register($checkoutData);
            CartService::destroy();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->route('account.orders');
    }
}
