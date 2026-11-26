<?php

namespace App\Providers;

use App\Support\Content;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Static page content ("Pages Content" module): every editable page view gets $c.
        View::composer('front.pages.*', function ($view) {
            if ($page = Content::pageForView($view->name())) {
                $view->with('c', Content::forPage($page));
            }
        });
    }
}
