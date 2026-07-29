@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body p-3">
                            <form method="GET" action="http://127.0.0.1:8000/admin/products">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                    <div class="d-flex flex-wrap gap-1 project-list-main align-items-center">
                                        <div class="d-flex me-2">
                                            <input class="form-control me-2" type="search" name="search"
                                                   placeholder="جستجو محصول"
                                                   value=""
                                                   aria-label="جستجو">
                                            <button class="btn btn-light" type="submit">جستجو</button>
                                        </div>

                                        <select id="choices-single-default" class="form-control" name="sort">
                                            <option value="">مرتب‌سازی بر اساس</option>
                                            <option
                                                value="newest" selected>
                                                جدیدترین
                                            </option>
                                            <option
                                                value="name_asc" >
                                                نام (صعودی)
                                            </option>
                                            <option
                                                value="name_desc" >
                                                نام (نزولی)
                                            </option>
                                            <option
                                                value="price_asc" >
                                                قیمت (کم به زیاد)
                                            </option>
                                            <option
                                                value="price_desc" >
                                                قیمت (زیاد به کم)
                                            </option>
                                        </select>
                                    </div>


                                    <div class="d-flex">
                                        <a href="{{route('admin.product.create')}}" class="btn btn-primary me-2">
                                            <i class="ri-add-line me-1 fw-medium align-middle"></i>
                                            ایجاد محصول
                                        </a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start::row-2 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="table-responsive">
                            <table class="table text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <th>نام</th>
                                    <th>دسته‌ بندی</th>
                                    <th>قیمت</th>
                                    <th>تخفیف</th>
                                    <th>موجودی</th>
                                    <th>تاریخ ثبت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr class="product-list">
                                        <td>
                                            <div class="d-flex">
                                                    @if($product->defaultImage)
                                                    <span class="avatar avatar-md avatar-square bg-light">
                                                    <img
                                                        src="{{getFileUrl($product->defaultImage->file_id)}}"
                                                        class="w-100 h-100" alt="گوشی هوشمند | Smartphone">
                                                </span>
                                                    @endif
                                                <div class="ms-2">
                                                    <p class="fw-semibold mb-0 name-limit">
                                                        <a href="{{route('admin.product.show',$product->id)}}">
                                                            {{$product->name}}
                                                              |
                                                            {{$product->en_name}}
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$product->productCategory->name}}</td>
                                        <td>
                                            {{number_format($product->price)}}
                                            تومان
                                        </td>
                                        @if($product->discount > 0)
                                            <td>
                                                {{number_format(amountNumber($product->price , $product->discount))}}
                                                تومان
                                            </td>
                                        @else
                                            <td>
                                                0
                                                تومان
                                            </td>
                                        @endif
                                        <td>
                                            {{$product->qty}}
                                        </td>
                                        <td>{{$product->created_at->toJalali()->format('H:i Y/m/d')}}</td>

                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                <a href="{{route('admin.product.show',$product->id)}}"
                                                   class="btn btn-primary-light btn-icon btn-sm"
                                                   data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                                <a href="{{route('admin.product.edit',$product->id)}}"
                                                   class="btn btn-secondary-light btn-icon btn-sm"
                                                   data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                    <i class="ti ti-pencil"></i>
                                                </a>
                                                <form action="{{route('admin.product.delete',$product->id)}}"
                                                      method="POST"
                                                      onsubmit="return confirm('آیا از حذف این محصول مطمئن هستید؟')"
                                                >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon btn-sm btn-danger-light">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                </form>
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
            <!-- End::row-2 -->

            {{$products->links()}}

        </div>
    </div>
@endsection
