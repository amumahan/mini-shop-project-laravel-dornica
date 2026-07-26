@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">

            <div class="row">
                <div class="col-xl-12">
                    <form action="http://127.0.0.1:8000/admin/products/store" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="VofHLLAqMD1Drv23vG8MgkBtFMjNl7t6G8gfBpxL" autocomplete="off">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">
                                    ایجاد محصول
                                </div>
                            </div>

                            <div class="card-body pt-0">


                                <div class="row gy-3">
                                    <!-- Name -->
                                    <div class="col-xl-6">
                                        <label class="form-label">نام فارسی</label>
                                        <input
                                            type="text"
                                            class="form-control" name="name"
                                            placeholder="نام فارسی را وارد کنید"
                                            value=""
                                        />
                                    </div>

                                    <!-- Name -->
                                    <div class="col-xl-6">
                                        <label class="form-label">نام انگلیسی</label>
                                        <input type="text" class="form-control" name="name_en"
                                               placeholder="نام انگلیسی را وارد کنید" value="">
                                    </div>

                                    <!-- Category -->
                                    <div class="col-xl-6">
                                        <label class="form-label">دسته‌ بندی</label>
                                        <select class="form-control" name="category_id">
                                            <option>یک دسته بندی انتخاب کنید</option>
                                            <option value="1" >
                                                الکترونیک
                                            </option>
                                            <option value="2" >
                                                کتاب
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Price -->
                                    <div class="col-xl-6">
                                        <label class="form-label">قیمت</label>
                                        <input type="number" class="form-control" name="price"
                                               placeholder="قیمت را وارد کنید" value="">
                                    </div>

                                    <!-- Discount Price -->
                                    <div class="col-xl-6">
                                        <label class="form-label">تخفیف</label>
                                        <input type="number" class="form-control" name="discount"
                                               placeholder="تخفیف را وارد کنید"
                                               value="">
                                    </div>

                                    <!-- Stock -->
                                    <div class="col-xl-6">
                                        <label class="form-label">موجودی</label>
                                        <input type="number" class="form-control" name="qty"
                                               placeholder="تعداد موجودی را وارد کنید" value="">
                                    </div>

                                    <!-- Description -->
                                    <div class="col-xl-12">
                                        <label class="form-label">توضیحات</label>
                                        <textarea class="form-control" name="description" rows="4"
                                                  placeholder="توضیحات را وارد کنید"></textarea>
                                    </div>
                                </div>

                                <!-- Product Images -->
                                <div
                                    class="image-upload-wrapper d-flex flex-wrap gap-2 px-0 pt-0 mt-3"
                                    id="imagePreviewContainer"
                                    style=" border-radius: 8px; padding: 10px;"
                                >
                                    <label
                                        id="uploadPlaceholder"
                                        class="upload-placeholder"
                                        for="imageInput"
                                        style="cursor: pointer; width:150px; height:150px; display: flex; justify-content: center; align-items: center; border: 2px dashed #ccc; border-radius: 8px; padding: 20px; text-align: center;"
                                    >
                                        <div>📷<br><strong>آپلود یا کشیدن</strong></div>
                                        <small style="color:#999;">JPG / PNG / JPEG / WEBP</small>
                                    </label>
                                    <input
                                        id="imageInput"
                                        name="images[]"
                                        type="file"
                                        accept=".jpg,.png,.jpeg,.webp"
                                        multiple
                                        style="display:none"
                                    />
                                </div>

                            </div>

                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">ایجاد محصول</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
