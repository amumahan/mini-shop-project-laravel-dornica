@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">

        <div class="container-fluid pt-4">


            <!-- Edit Form -->
            <div class="card custom-card">
                <div class="card-body">


                    <form action="{{route('admin.order.update', $order->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label fw-semibold">وضعیت سفارش</label>

                            <select name="status" id="status" class="form-select ">
                                <option
                                    value="{{\App\Enums\OrderStatus::PENDING}}"
                                    @selected(old('status', $order->status->value) == \App\Enums\OrderStatus::PENDING->value)
                                >در انتظار ثبت</option>
                                <option
                                    value="{{\App\Enums\OrderStatus::PROCESSING}}"
                                    @selected(old('status', $order->status->value) == \App\Enums\OrderStatus::PROCESSING->value)
                                >در حال پردازش</option>
                                <option
                                    value="{{\App\Enums\OrderStatus::SENT}}"
                                    @selected(old('status', $order->status->value) == \App\Enums\OrderStatus::SENT->value)
                                >ارسال شده</option>
                                <option
                                    value="{{\App\Enums\OrderStatus::DELIVERED}}"
                                    @selected(old('status', $order->status->value) == \App\Enums\OrderStatus::DELIVERED->value)
                                >تحویل داده</option>
                                <option
                                    value="{{\App\Enums\OrderStatus::CANCELLED}}"
                                    @selected(old('status', $order->status->value) == \App\Enums\OrderStatus::CANCELLED->value)
                                >لغو شده</option>
                                <option
                                    value="{{\App\Enums\OrderStatus::REFUND}}"
                                    @selected(old('status', $order->status->value) == \App\Enums\OrderStatus::REFUND->value)
                                >مرجوع شده</option>
                            </select>
                        </div>


                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-wave">
                            ذخیره تغییرات
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
