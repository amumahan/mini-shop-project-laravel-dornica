@extends('admin.layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid pt-4">


            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body">

                            <!-- Product Images -->
                            <div class="image-upload-wrapper d-flex flex-wrap gap-2 mb-4"
                                 style="border-radius: 8px; padding: 10px;">
                                <div style="width:150px;height:150px;">
                                    <img src="/storage/products/86RqhSSnghgyin7JcuD5OEU7LVIZLjWwZm7UgaAq.webp" class="img-fluid rounded"
                                         style="width:100%;height:100%;object-fit:cover;" alt="تصویر محصول">
                                </div>
                            </div>

                            <div class="row gy-3">
                                <div class="col-xl-6">
                                    <strong>نام محصول:</strong>
                                    <p>گوشی اپل iPhone 16 CH رجیستر‌شده دو سیم‌کارت 128 گیگابایت با رم 8 گیگابایت</p>
                                </div>

                                <div class="col-xl-6">
                                    <strong>اسلاگ:</strong>
                                    <p>iphone7</p>
                                </div>

                                <div class="col-xl-6">
                                    <strong>دسته‌بندی:</strong>
                                    <p>موبایل</p>
                                </div>

                                <div class="col-xl-6">
                                    <strong>قیمت:</strong>
                                    <p>89,999,000 تومان</p>
                                </div>

                                <div class="col-xl-6">
                                    <strong>قیمت تخفیفی:</strong>
                                    <p>
                                        2,000 تومان
                                    </p>
                                </div>

                                <div class="col-xl-6">
                                    <strong>موجودی:</strong>
                                    <p>8</p>
                                </div>

                                <div class="col-xl-6">
                                    <strong>وضعیت:</strong>
                                    <p>
                                        <span class="badge bg-success">فعال</span>
                                    </p>
                                </div>

                                <div class="col-xl-12">
                                    <strong>توضیحات:</strong>
                                    <p>گوشی موبایل اپل مدل iPhone 16، به عنوان یکی از جدیدترین مدل‌های این برند معتبر، با طراحی مدرن و ویژگی‌های پیشرفته، تجربه‌ای بی‌نظیر از دنیای تکنولوژی را برای کاربران فراهم می‌کند. این گوشی با ظرفیت 128 گیگابایت و رم 8 گیگابایت، عملکردی سریع و روان را ارائه می‌دهد که به راحتی از پس کارهای روزمره و multitasking برمی‌آید. طراحی این دستگاه با دقت و ظرافت بالا انجام شده و بدنه آن از مواد با کیفیت ساخته شده است که حس لوکس بودن را به کاربر منتقل می‌کند. قابلیت پشتیبانی از دو سیم کارت، امکان استفاده همزمان از دو شماره تلفن را برای کاربران فراهم می‌کند که این ویژگی به‌خصوص برای افرادی که به دو شماره مختلف برای کار و زندگی شخصی نیاز دارند بسیار مفید است. دوربین‌های با کیفیت iPhone 16، تجربه عکاسی فوق‌العاده‌ای را ارائه می‌دهند و با فناوری‌های نوین، امکان ثبت لحظات خاص با جزئیات بالا را فراهم می‌کنند. همچنین، باتری با عمر طولانی و قابلیت‌های شارژ سریع، این اطمینان را به شما می‌دهد که می‌توانید در طول روز به راحتی از گوشی خودتان استفاده کنید. به‌طور کلی، iPhone 16 یک انتخاب عالی برای کسانی است که به دنبال ترکیبی از کیفیت، قدرت و طراحی مدرن هستند. همانطور که می‌دانید گوشی‌های آیفون با پارت نامبرهای مختلفی از جمله CH، ZAA، LLAT ZPAو ... در بازار وجود دارند. پارت نامبر CH مربوط به کشور چین است که تفاوت خاصی با دیگر پارت نامبرها ندارند و تنها در مورد استفاده از تماس‌های صوتی و تماس‌های گروهی در نرم افزار فیس تایم شامل محدودیت است. این پارت نامبر از دو سیم‌کارت فیزیکی پشتیبانی می‌کند که یک نکته مثبت محسوب می‌شود. این گوشی، مانند تمامی گوشی‌های عرضه‌شده در دیجی‌کالا، به صورت قانونی و تجاری وارد کشور شده و با رجیستر رسمی، کارت گارانتی معتبر و کد فعال‌سازی به شما تحویل داده می‌شود.</p>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer text-end">
                            <a href="http://127.0.0.1:8000/admin/products" class="btn btn-secondary">
                                بازگشت به لیست محصولات
                            </a>
                            <a href="http://127.0.0.1:8000/admin/products/8/edit" class="btn btn-warning ms-2">ویرایش محصول</a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
