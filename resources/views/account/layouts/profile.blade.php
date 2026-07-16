@extends('account.layouts.app')
@section('account-content')

        <main class="container relative">
            <div class="flex flex-col lg:flex-row gap-x-8 mt-10"

            >
                <!-- TOP FILTER BOX & PRODUCT & PAGINATION -->
                <div class="lg:w-3/4">
                    <div class="flex lg:hidden">
                        <button class="open-user-menu mr-2 bg-blue-500 flex items-center gap-x-1 font-DanaMedium text-white p-2 rounded-lg text-sm">
                            <svg class="size-5">
                                <use href="#bars-3" />
                            </svg>
                            منوی کاربری
                        </button>
                        <div class="user-menu">
                            <button class="close-user-menu">
                                <svg class="size-6">
                                    <use href="#x-mark" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col shadow rounded-lg p-4 dark:bg-gray-800 bg-white mt-5 lg:mt-0">
                        <div class="flex items-center justify-between">
                            <h2 class="font-DanaMedium text-lg">اطلاعات حساب کاربری</h2>
                        </div>
                        <form class="mt-5 grid grid-cols-12 gap-5 child:col-span-12 child:lg:col-span-6" action="{{route('account.profile.edit')}}" method="POST">
{{--                            @error('update')--}}
{{--                            <span style="color: red">{{ $message }}</span>--}}
{{--                            @enderror--}}
                            @csrf
                            <!-- ITEM -->
                            <div>
                                <label for="email" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                                    نام
                                </label>
                                <div class="mt-3 relative">
                                    <input type="text"
                                           class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                                    name="first_name"
                                    value="{{$user['first_name']}}">
                                    <button type="button" class="absolute left-3 top-3 z-10">
                                        <svg class="size-5 text-gray-500">
                                            <use href="#edit"></use>
                                        </svg>
                                    </button>
                                </div>
                                @error('first_name')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- ITEM -->
                            <div>
                                <label for="email" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                                    نام خانوادگی
                                </label>
                                <div class="mt-3 relative">
                                    <input type="text"
                                           class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                                    name="last_name"
                                    value="{{$user['last_name']}}">
                                    <button type="button" class="absolute left-3 top-3 z-10">
                                        <svg class="size-5 text-gray-500">
                                            <use href="#edit"></use>
                                        </svg>
                                    </button>
                                </div>
                                @error('last_name')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- ITEM -->
                            <div>
                                <label for="email" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                                    شماره موبایل
                                </label>
                                <div class="mt-3 relative">
                                    <input type="text"
                                           class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                                    name="mobile"
                                    value="{{$user['mobile']}}">
                                    <button type="button" class="absolute left-3 top-3 z-10">
                                        <svg class="size-5 text-gray-500">
                                            <use href="#edit"></use>
                                        </svg>
                                    </button>
                                </div>
                                @error('mobile')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- ITEM -->
                            <div>
                                <label for="email" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                                    ایمیل
                                </label>
                                <div class="mt-3 relative">
                                    <input type="text"
                                           class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                                    name="email"
                                    value="{{$user['email']}}">
                                    <button type="button" class="absolute left-3 top-3 z-10">
                                        <svg class="size-5 text-gray-500">
                                            <use href="#plus"></use>
                                        </svg>
                                    </button>
                                </div>
                                @error('email')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- ITEM -->
                            <div>
                                <label for="email" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                                    رمز عبور
                                </label>
                                <div class="mt-3 relative">
                                    <input type="text" placeholder="......"
                                           class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                                    name="password">
                                    <button type="button" class="absolute left-3 top-3 z-10">
                                        <svg class="size-5 text-gray-500">
                                            <use href="#edit"></use>
                                        </svg>
                                    </button>
                                </div>
                                <span class="text-sm/6">
                                در صورت تغییر رمز عبور پر کنید.
                            </span>
                                @error('password')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-span-12 flex justify-center">
                                <button
                                    type="submit"
                                    class="flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-DanaMedium w-32 h-10 rounded-md transition">
                                    ذخیره اطلاعات
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
@endsection

