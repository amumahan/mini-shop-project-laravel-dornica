<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class OrderController
{
    public function index()
    {
        return view('admin.orders.index');
    }
}
