<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\ProductCategory;

class CategoryController
{
    public function index()
    {
        $categories = ProductCategory::with('products')
            ->applySort()
            ->applySearch()
            ->paginate(1);
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
        $category = ProductCategory::find($categoryId);
        return view('admin.categories.edit',compact('category'));
    }

    public function update(CategoryUpdateRequest $request , $categoryId)
    {
        $input = $request->validated();
        ProductCategory::find($categoryId)->update($input);
        return redirect()->route('admin.category.index');
    }
    public function delete($categoryId)
    {
        ProductCategory::find($categoryId)->delete();
        return back();
    }
}
