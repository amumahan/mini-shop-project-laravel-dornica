<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        View::composer('layouts.footer', function ($view) {
            $setting = Setting::first();

            $view->with('setting', $setting);
        });
        View::composer('layouts.slider', function ($view) {

            $sliders = Slider::query()
                ->with('file')
                ->get();

            $view->with('sliders', $sliders);
        });
    }
}
