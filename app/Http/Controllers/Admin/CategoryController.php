<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController
{
    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $input = $request->validated();
        ProductCategory::create([
            'name' => $input['name'],
            'is_active' => 1
        ]);
        return redirect()->route('admin.category.index');
    }
}
