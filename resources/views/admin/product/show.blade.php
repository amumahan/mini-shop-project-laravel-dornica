@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">


            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body">

                            <!-- Product Images -->
                            <div class="image-upload-wrapper d-flex flex-wrap gap-2 mb-4"
                                 style="border-radius: 8px; padding: 10px;">
                                <div style="width:150px;height:150px;">
                                    <img src="/storage/products/86RqhSSnghgyin7JcuD5OEU7LVIZLjWwZm7UgaAq.webp" class="img-fluid rounded"
                                         style="width:100%;height:100%;object-fit:cover;" alt="تصویر محصول">
                                </div>
                            </div>

                            <div class="row gy-3">
                                <div class="col-xl-6">
                                    <strong>نام محصول:</strong>
                                    <p>{{$product->name}}</p>
                                </div>

                                <div class="col-xl-6">
                                    <strong>اسلاگ:</strong>
                                    <p>{{$product->en_name}}</p>
                                </div>

                                <div class="col-xl-6">
                                    <strong>دسته‌بندی:</strong>
                                    <p>{{$product->productCategory->name}}</p>
                                </div>

                                <div class="col-xl-6">
                                    <strong>قیمت:</strong>
                                    <p>
                                        {{number_format($product->price)}}
                                        تومان</p>
                                </div>

                                <div class="col-xl-6">
                                    <strong>قیمت تخفیفی:</strong>
                                    <p>
                                        {{number_format(amountNumber($product->price , $product->discount))}}
                                         تومان
                                    </p>
                                </div>

                                <div class="col-xl-6">
                                    <strong>موجودی:</strong>
                                    <p>{{$product->qty}}</p>
                                </div>

                                <div class="col-xl-6">
                                    <strong>وضعیت:</strong>
                                    <p>
                                         <span class="text-info">@switch($product->status)
                                                 @case(\App\Enums\ProductStatus::DISABLE)
                                                     <span style="color: gray">غیر فعال</span>
                                                     @break
                                                 @case(\App\Enums\ProductStatus::DRAFT)
                                                     <span style="color: yellowgreen">پیش نویس</span>
                                                     @break
                                                 @case(\App\Enums\ProductStatus::PUBLISHED)
                                                     <span style="color: green">منتشر شده</span>
                                                     @break
                                             @endswitch</span>
                                    </p>
                                </div>

                                <div class="col-xl-12">
                                    <strong>توضیحات:</strong>
                                    <p>
                                        {{$product->description}}
                                    </p>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer text-end">
                            <a href="{{route('admin.product.index')}}" class="btn btn-secondary">
                                بازگشت به لیست محصولات
                            </a>
                            <a href="{{route('admin.product.edit' , $product->id)}}" class="btn btn-warning ms-2">ویرایش محصول</a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
