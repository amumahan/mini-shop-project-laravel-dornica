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
                                    <h2 class="fw-bold mb-3">کالای دیجیتال</h2>

                                    <dl class="row mb-4">
                                        <dt class="col-sm-4 fw-semibold">نامک (Slug):</dt>
                                        <dd class="col-sm-8 text-break">digital stuff</dd>

                                        <dt class="col-sm-4 fw-semibold">توضیحات:</dt>
                                        <dd class="col-sm-8">نمیدانم اطلاعی ندارم</dd>
                                    </dl>

                                    <div class="row text-center text-md-start">
                                        <div class="col-6 col-md-4 mb-3">
                                            <div class="p-3 border rounded bg-light">
                                                <div class="fs-4 fw-bold">1</div>
                                                <div class="text-muted">تعداد محصولات</div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 mb-3">
                                            <div class="p-3 border rounded bg-light">
                                                <div class="fs-4 fw-bold">
                                                    <span class="text-success pe-3 py-2 fs-6">فعال</span>
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
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-md avatar-square bg-light">
                                                <img
                                                    src="/assets/admin/images/product-default-image.png"
                                                    class="w-100 h-100" alt="لپ تاپ asus مدل rog">
                                            </span>
                                            <div class="ms-2">
                                                <p class="fw-semibold mb-0">لپ تاپ asus مدل rog</p>
                                                <p class="fs-12 text-muted mb-0 description-limit">هیچ توضیحی نداریم واضحه باید بخری</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>کالای دیجیتال</td>
                                    <td>500,000 تومان</td>
                                    <td>
                                        <span class="text-success">2,000 تومان</span>
                                    </td>
                                    <td>10</td>
                                    <td>
                                        <span class="badge bg-primary-transparent">
                                            منتشر شد
                                        </span>
                                    </td>
                                    <td>20 مرداد 1404 - 05:46</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="http://127.0.0.1:8000/admin/products/9"
                                               class="btn btn-primary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                <i class="ri-eye-line"></i>
                                            </a>

                                            <a href="http://127.0.0.1:8000/admin/products/9/edit"
                                               class="btn btn-secondary-light btn-icon btn-sm"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
