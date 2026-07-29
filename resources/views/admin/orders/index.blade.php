@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">

            <!-- Filters -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body p-3">
                            <form method="GET" action="http://127.0.0.1:8000/admin/orders">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                    <!-- Sort Dropdown -->
                                    <div class="d-flex flex-wrap gap-1 align-items-center">
                                        <select id="choices-single-default" class="form-control" name="sort">
                                            <option value="">مرتب‌سازی بر اساس</option>
                                            <option
                                                value="created_at_desc" selected>
                                                جدیدترین
                                            </option>
                                            <option
                                                value="created_at_asc" >
                                                قدیمی‌ترین
                                            </option>
                                            <option
                                                value="price_high" >
                                                مبلغ (زیاد به کم)
                                            </option>
                                            <option
                                                value="price_low" >
                                                مبلغ (کم به زیاد)
                                            </option>
                                            <option value="status" >
                                                وضعیت
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Search -->
                                    <div class="d-flex" role="search">
                                        <input class="form-control me-2" type="search" name="search"
                                               placeholder="جستجو سفارش"
                                               value=""
                                        >
                                        <button class="btn btn-light" type="submit">جستجو</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Table -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="table-responsive">
                            <table class="table text-nowrap table-hover">
                                <thead>
                                <tr>
                                    <th>شناسه</th>
                                    <th>مشتری</th>
                                    <th>مبلغ</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ ثبت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div>
                                                    <span class="fw-semibold d-block">#{{$order->id}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{getUserFullName($order->user)}}
                                        </td>
                                        <td>
                                            {{$order->final_price}}
                                            تومان
                                        </td>
                                        <td>
                                             <span class="text-info">
                                                 @switch($order->status)
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
                                                 @endswitch
                                             </span>
                                        </td>
                                        <td>{{$order->created_at->toJalali()->format('H:i Y/m/d')}}</td>
                                        <td>
                                            <div class="btn-list">
                                                <a href="{{route('admin.order.show',$order->id)}}"
                                                   class="btn btn-primary-light btn-icon btn-sm"
                                                   data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                                <a href="{{route('admin.order.edit',$order->id)}}"
                                                   class="btn btn-secondary-light btn-icon btn-sm"
                                                   data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش">
                                                    <i class="ti ti-pencil"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                   onclick="if(confirm('آیا از حذف این سفارش مطمئن هستید؟')) { document.getElementById('delete-form-2').submit(); }"
                                                   class="btn btn-pink-light btn-icon btn-sm"
                                                   data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                                <form id="delete-form-2"
                                                      action="{{route('admin.order.delete',$order->id)}}"
                                                      method="POST"
                                                      style="display:none;"
                                                >
                                                    @csrf
                                                    @method('DELETE')
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



        </div>
    </div>
@endsection
