<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController
{
    public function index()
    {
        $categories = ProductCategory::with('products')->get();
        return view('admin.categories.index',compact('categories'));
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

    public function show($categoryId)
    {
        $category = ProductCategory::query()
            ->where('id','=',$categoryId)
            ->with('products')
            ->first();
        return view('admin.categories.show', compact('category'));
    }

    public function edit($categoryId)
    {
        return view('admin.categories.edit');
    }

    public function update($categoryId)
    {

    }
    public function delete($categoryId)
    {

    }
}
