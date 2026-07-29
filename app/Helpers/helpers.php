<?php

use App\Services\CartService;

if (!function_exists('amountNumber')) {
    function amountNumber(int|float $price ,int|float $amount):int
    {
        $finalPrice =  $price * $amount / 100;
        return  $price - $finalPrice;

    }
}

if (!function_exists('getUserFullName')){
    function getUserFullName(?\App\Models\User $user = null):string
    {
        if (!$user) {
            $user = auth()->user();
        }
        $firstName = $user->first_name;
        $last_name = $user->last_name;
        $fullName = $firstName . ' ' . $last_name;
        return $fullName;
    }
}

if (!function_exists('activeAccountBox')) {
    function activeAccountBox(string $routeName):string
    {
        $route = \Illuminate\Support\Facades\Route::currentRouteName() == $routeName;
        if ($route) {
            return 'bg-blue-500/10 text-blue-500';
        }
        return 'hover:text-blue-500';
    }
}

if (!function_exists('activeSort')) {
    function activeSort(string $type)
    {
        $request = request()->input('sort');
        if ($request == $type) {
            return 'text-blue-500';
        }
        return 'text-gray-400';
    }
}

if (!function_exists('generateSortRouteParameter')) {
    function generateSortRouteParameter(string $type):array
    {
        $request = request();
        $queries = $request->all();
        $queries['sort'] = $type;
        return $queries;
    }

    if (!function_exists('totalAllProductPrice')) {
        function totalAllProductPrice() : int
        {
            return CartService::productPrice()-CartService::totalPrice();
        }
    }

    if (!function_exists('activeAdminSidebar')) {
        function activeAdminSidebar(string $routName):string
        {
            $rout = \Illuminate\Support\Facades\Route::currentRouteName() == $routName;
            if ($rout) {
                return 'active';
            }
            return '';
        }
    }

    if (!function_exists('getFileUrl')) {
        function getFileUrl(int $fileId):?string
        {
            $file = \App\Models\File::find($fileId);
            if (!$file) {
                return null;
            }
//            dd(\Illuminate\Support\Facades\Storage::disk('public')->url($file->path));
            return \Illuminate\Support\Facades\Storage::disk('public')->url($file->path);
        }
    }
}


