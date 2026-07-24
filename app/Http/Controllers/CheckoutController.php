<?php

namespace App\Http\Controllers;

use App\Http\Requests\Account\CheckoutStoreRequest;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Http\Request;

class CheckoutController
{
    //
    public function index()
    {
        $withoutSlider = true;
        $userCart = CartService::getItemWithDetails();
        return view('checkout.index',compact('withoutSlider','userCart'));
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
        OrderService::register($checkoutData);
        return redirect()->route('account.orders');
    }
}
