@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">


            <div class="row">
                <div class="col-xl-12">

                    <div class="card custom-card mb-4">
                        <div class="card-header">
                            <div class="card-title">اطلاعات دسته‌بندی</div>
                        </div>

                        <div class="card-body">
                            <div class="row gx-4 gy-4 align-items-center">

                                <div class="col-md-8">
                                    <h2 class="fw-bold mb-3">{{$category->name}}</h2>

                                    <dl class="row mb-4">

                                        <dt class="col-sm-4 fw-semibold">توضیحات:</dt>
                                        <dd class="col-sm-8">نمیدانم اطلاعی ندارم</dd>
                                    </dl>

                                    <div class="row text-center text-md-start">
                                        <div class="col-6 col-md-4 mb-3">
                                            <div class="p-3 border rounded bg-light">
                                                <div class="fs-4 fw-bold">{{count($category->products)}}</div>
                                                <div class="text-muted">تعداد محصولات</div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 mb-3">
                                            <div class="p-3 border rounded bg-light">
                                                <div class="fs-4 fw-bold">
                                                    @if($category->is_active == 1)
                                                        <span class="text-success pe-3 py-2 fs-6">فعال</span>
                                                    @else
                                                        <span class="text-success pe-3 py-2 fs-6">غیر فعال</span>
                                                    @endif
                                                </div>
                                                <div class="text-muted">وضعیت دسته‌بندی</div>
                                            </div>
                                        </div>
                                        <!-- اگر اطلاعات وضعیت دیگه‌ای داری می‌تونی اینجا اضافه کنی -->
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- Products List -->
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">محصولات دسته‌بندی</div>
                        </div>

                        <div class="table-responsive">
                            <table class="table text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <th>محصول</th>
                                    <th>دسته‌بندی فعلی</th>
                                    <th>قیمت</th>
                                    <th>قیمت تخفیف‌خورده</th>
                                    <th>موجودی</th>
                                    <th>وضعیت</th>
                                    <th>منتشر شده</th>
                                    <th>اقدامات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($category->products as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">

                                                <div class="ms-2">
                                                    <p class="fw-semibold mb-0">{{$product->name}}</p>
                                                    <p class="fs-12 text-muted mb-0 description-limit">{{$product->description}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$category->name}}</td>
                                        <td>{{number_format($product->price)}}</td>
                                        <td>
                                            <span class="text-success">{{number_format(amountNumber($product->price , $product->discount))}}</span>
                                        </td>
                                        <td>{{$product->qty}}</td>
                                        <td>
                                        <span class="badge bg-primary-transparent">
                                              @switch($product->status)
                                                @case(\App\Enums\ProductStatus::DISABLE)
                                                    <span style="color: gray">غیر فعال</span>
                                                    @break
                                                @case(\App\Enums\ProductStatus::DRAFT)
                                                    <span style="color: yellowgreen">پیش نویس</span>
                                                    @break
                                                @case(\App\Enums\ProductStatus::PUBLISHED)
                                                    <span style="color: green">منتشر شده</span>
                                                    @break
                                            @endswitch
                                        </span>
                                        </td>
                                        <td>{{$product->created_at->toJalali()->format('H:i Y/m/d')}}</td>
                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                <a href="{{route('admin.product.show',$product->id)}}"
                                                   class="btn btn-primary-light btn-icon btn-sm"
                                                   data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                    <i class="ri-eye-line"></i>
                                                </a>

                                                <a href="{{route('admin.product.edit', $product->id)}}"
                                                   class="btn btn-secondary-light btn-icon btn-sm"
                                                   data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                    <i class="ti ti-pencil"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
