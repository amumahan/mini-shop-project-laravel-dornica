<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class CategoryController
{
    public function index()
    {
        return view('admin.categories.index');
    }
}
