@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">

        <div class="container-fluid pt-4">


            <!-- Edit Form -->
            <div class="card custom-card">
                <div class="card-body">


                    <form action="http://127.0.0.1:8000/admin/orders/2/update" method="POST">
                        <input type="hidden" name="_token" value="VofHLLAqMD1Drv23vG8MgkBtFMjNl7t6G8gfBpxL" autocomplete="off">                        <input type="hidden" name="_method" value="PATCH">
                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label fw-semibold">وضعیت سفارش</label>

                            <select name="status" id="status" class="form-select ">
                                <option
                                    value="0"
                                >در انتظار ثبت</option>
                                <option
                                    value="1"
                                    selected                                >در حال پردازش</option>
                                <option
                                    value="2"
                                >ارسال شده</option>
                                <option
                                    value="3"
                                >تحویل داده</option>
                                <option
                                    value="4"
                                >لغو شده</option>
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
