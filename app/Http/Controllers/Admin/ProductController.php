<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ProductController
{
    public function index()
    {
        return view('admin.product.index');
    }
}
