@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">

            <div class="row">
                <div class="col-xl-12">
                    <form action="http://127.0.0.1:8000/admin/products/1/update" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="VofHLLAqMD1Drv23vG8MgkBtFMjNl7t6G8gfBpxL" autocomplete="off">                        <input type="hidden" name="_method" value="PUT">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">
                                    ویرایش محصول
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
                                            value="گوشی هوشمند"
                                        />
                                    </div>

                                    <!-- Name -->
                                    <div class="col-xl-6">
                                        <label class="form-label">نام انگلیسی</label>
                                        <input type="text" class="form-control" name="name_en"
                                               placeholder="نام انگلیسی را وارد کنید" value="Smartphone">
                                    </div>

                                    <!-- Category -->
                                    <div class="col-xl-6">
                                        <label class="form-label">دسته‌ بندی</label>
                                        <select class="form-control" name="category_id">
                                            <option>یک دسته بندی انتخاب کنید</option>
                                            <option value="1" selected>
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
                                               placeholder="قیمت را وارد کنید" value="500000">
                                    </div>

                                    <!-- Discount Price -->
                                    <div class="col-xl-6">
                                        <label class="form-label">تخفیف</label>
                                        <input type="number" class="form-control" name="discount"
                                               placeholder="تخفیف را وارد کنید"
                                               value="50000">
                                    </div>

                                    <!-- Stock -->
                                    <div class="col-xl-6">
                                        <label class="form-label">موجودی</label>
                                        <input type="number" class="form-control" name="qty"
                                               placeholder="تعداد موجودی را وارد کنید" value="10">
                                    </div>

                                    <!-- Description -->
                                    <div class="col-xl-12">
                                        <label class="form-label">توضیحات</label>
                                        <textarea class="form-control" name="description" rows="4"
                                                  placeholder="توضیحات را وارد کنید">جدیدترین مدل گوشی هوشمند.</textarea>
                                    </div>
                                </div>

                                <!-- Product Images -->
                                <div
                                    class="image-upload-wrapper d-flex flex-wrap gap-2 px-0 pt-0 mt-3"
                                    id="imagePreviewContainer"
                                    style=" border-radius: 8px; padding: 10px;"
                                >
                                    <div class="position-relative" style="width:150px;height:150px;">
                                        <img src="http://127.0.0.1:8000/storage/product_images/1_1759669026_63170.png"
                                             class="img-fluid rounded"
                                             style="width:100%;height:100%;object-fit:cover;" alt="">
                                        <a href="http://127.0.0.1:8000/admin/products/1/remove-image/4"
                                           class="remove-btn btn btn-sm btn-danger position-absolute top-0 end-0 delete-image"
                                           data-confirm="حذف این تصویر؟">×</a>
                                    </div>

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
                                <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
