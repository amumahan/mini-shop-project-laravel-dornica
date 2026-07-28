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
                                    <div>شناسه: <span class="text-primary fw-semibold">{{$orderDetails->id}}</span></div>
                                </div>
                                <div class="card-body p-0 table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="fw-semibold">تعداد کالا:</div>
                                            </td>
                                            <td>{{$orderDetails->total_products}}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="fw-semibold">وضعیت سفارش:</div>
                                            </td>
                                            <td>
                                                 <span class="text-info">@switch($orderDetails->status)
                                                         @case(\App\Enums\OrderStatus::PENDING)
                                                             <span style="color: gray">در انتضار برسی</span>
                                                             @break
                                                         @case(\App\Enums\OrderStatus::PROCESSING)
                                                             <span style="color: yellowgreen">درحال پردازش</span>
                                                             @break
                                                         @case(\App\Enums\OrderStatus::SENT)
                                                             <span style="color: green">ارسال شده</span>
                                                             @break
                                                         @case(\App\Enums\OrderStatus::DELIVERED)
                                                             <span style="color: blue">تحویل داده شده</span>
                                                             @break
                                                         @case(\App\Enums\OrderStatus::CANCELLED)
                                                             <span style="color: red">لغو شده</span>
                                                             @break
                                                         @case(\App\Enums\OrderStatus::REFUND)
                                                             <span style="color: #997404">مرجوع شده</span>
                                                             @break
                                                     @endswitch</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="fw-semibold">مبلغ کل:</div>
                                            </td>
                                            <td>
                                                <span class="fw-medium">
                                                    {{number_format($orderDetails->final_price)}}
                                                    تومان
                                                </span>
                                            </td>
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
                                        {{$orderDetails->user_province}}
                                        -
                                        {{$orderDetails->user_city}}
                                        -
                                        {{$orderDetails->user_address}}
                                    </p>
                                    <p>
                                        <strong>شماره تماس:</strong>
                                        {{$orderDetails->user->mobile}}
                                    </p>
                                    <p>
                                        <strong>کد پستی:</strong>
                                        {{$orderDetails->user_postal_code}}
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
                            <p><strong>نام:</strong>{{getUserFullName($orderDetails->user)}}</p>
                            <p><strong>ایمیل:</strong>{{$orderDetails->user->email}}</p>
                            <p><strong>موبایل:</strong> {{$orderDetails->user->mobile}}</p>
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
                                {{$orderDetails->created_at->toJalali()->format('H:i Y/m/d')}}
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
                                    @foreach($orderItems as $orderItem)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="mb-1 fs-14 fw-medium">
                                                        <span>
                                                            {{$orderItem->product->name}}
                                                             |
                                                            {{$orderItem->product->en_name}}
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{number_format($orderItem->unit_price)}}
                                                تومان
                                            </td>
                                            <td>{{$orderItem->qty}}</td>
                                            <td>
                                                {{number_format($orderItem->total_price)}}
                                                تومان
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
    </div>
@endsection
