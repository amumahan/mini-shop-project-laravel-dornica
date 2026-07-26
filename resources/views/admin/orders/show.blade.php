@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">

            <!-- Main Row -->
            <div class="row">
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Summary -->
                            <div class="card custom-card overflow-hidden" style="padding-bottom: 6px !important;">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">خلاصه سفارش</div>
                                    <div>شناسه: <span class="text-primary fw-semibold">2</span></div>
                                </div>
                                <div class="card-body p-0 table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="fw-semibold">تعداد کالا:</div>
                                            </td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="fw-semibold">وضعیت سفارش:</div>
                                            </td>
                                            <td>
                                                <span class="text-info">در حال پردازش</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="fw-semibold">مبلغ کل:</div>
                                            </td>
                                            <td>
                                                <span class="fw-medium">
                                                    79,000
                                                    تومان
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom: 0;">
                                                <div class="fw-semibold">توضیحات:</div>
                                            </td>
                                            <td style="border-bottom: 0;"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Address Info -->
                        <div class="col-md-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">آدرس تحویل</div>
                                </div>
                                <div class="card-body">
                                    <p>
                                        <strong>آدرس:</strong>
                                        مازندران
                                        -
                                        ساری
                                        -
                                        تست
                                    </p>
                                    <p>
                                        <strong>شماره تماس:</strong>
                                        01133132166
                                    </p>
                                    <p>
                                        <strong>کد پستی:</strong>
                                        4849176981
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-xl-4">

                    <!-- User Info -->
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">مشخصات کاربر</div>
                        </div>
                        <div class="card-body">
                            <p><strong>نام:</strong> مهدی هاشمی</p>
                            <p><strong>ایمیل:</strong> sirj3x@gmail.com</p>
                            <p><strong>موبایل:</strong> 09359953331</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div>
                    <!-- Order Card -->
                    <div class="card custom-card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title">
                                محصولات سفارش
                            </div>
                            <div>
                            <span class="badge bg-primary-transparent">
                                تاریخ سفارش:
                                11:34 1404/07/24
                            </span>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                    <tr>
                                        <th scope="col">محصول</th>
                                        <th scope="col">قیمت</th>
                                        <th scope="col">تعداد</th>
                                        <th scope="col">مبلغ نهایی</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="mb-1 fs-14 fw-medium">
                                                        <span>
                                                            رمان | Novel
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            80,000
                                            تومان
                                        </td>
                                        <td>1</td>
                                        <td>
                                            80,000
                                            تومان
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
    </div>
@endsection
