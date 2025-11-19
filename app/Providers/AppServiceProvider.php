<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Language;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
          // $products = [];

        //
        $web_site_languages = [];
        // $products = [];

        $web_site_languages = Language::orderBy('id', 'asc')->get();
        // $products = Product::get();

        View::composer('*', function ($view) use ($web_site_languages) {
            $view->with('web_site_languages',  $web_site_languages);
            //         ->with('allproducts',  $products);

        });
    }
}
