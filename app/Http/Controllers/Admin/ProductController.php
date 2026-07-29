<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ProductStatus;
use App\Http\Requests\Admin\OrderUpdateRequest;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Models\File;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController
{
    public function index()
    {
        $products = Product::query()
            ->with('productCategory')
            ->get();
        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        $productCategory = ProductCategory::query()
            ->pluck('name','id');
        return view('admin.product.create',compact('productCategory'));
    }

    public function store(ProductStoreRequest $request)
    {
        $inputs = $request->validated();
        try {
            DB::begintransaction();

            $product = Product::create([
                'name' => $inputs['name'],
                'en_name' => $inputs['en_name'],
                'price' => $inputs['price'],
                'qty' => $inputs['qty'],
                'product_category_id' => $inputs['category_id'],
                'description' => $inputs['description'],
                'discount' => $inputs['discount'],
                'status' => ProductStatus::PUBLISHED,
            ]);
            $isDefault = true;
            foreach ($inputs['images'] as $image) {
                $imageName = $product->id . '.' . time() . '.' . rand(11111,99999) . '.' . $image->extension();
                $path = $image->storeAs('product_images',$imageName,'public');
                $file = File::create([
                    'name' => $imageName,
                    'extension' => $image->extension(),
                    'original_name' => $image->getClientOriginalName(),
                    'size' => $image->getSize(),
                    'path' => $path,
                ]);

                $productImage = ProductImage::create([
                    'product_id' => $product->id,
                    'file_id' => $file->id,
                    'is_difault' => $isDefault
                ]);
                if ($isDefault) {
                    $isDefault = false;
                }

            }
        DB::commit();

        }catch (\Exception $exception) {
            Log::error($exception);
            DB::rollBack();
            return back();
        }
        return redirect()->route('admin.product.index');
    }
    public function show($productId)
    {
        $product = Product::query()
            ->where('id','=',$productId)
            ->with('productCategory')
        ->first();
        return view('admin.product.show' , compact('product'));
    }

    public function edit($productId)
    {
        $order = Order::query()
            ->where('id','=',$productId)
            ->first();
        return view('admin.product.edit',compact('order'));
    }

    public function update(OrderUpdateRequest $request , $productId)
    {
//        dd(
//            $request->all()
//        );
        $input = $request->validated();
        $product = Order::query()
            ->where('id','=',$productId)
            ->first();
        $product->update($input);
        return redirect()->back();
    }

    public function delete($productId)
    {
        Order::query()
            ->where('id','=',$productId)
            ->delete();
        return redirect()->back()->withErrors('delete', 'سفارش حذف شد');
    }



}
