<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\HomeComposer;

use Illuminate\Support\Facades\{ Blade, View, Route };
use Cart;



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
        setlocale(LC_TIME, config('app.locale'));

        View::composer(['front.layout', 'front.index'], HomeComposer::class);

        View::composer('back.layout', function ($view) {
            $title = config('titles.' . Route::currentRouteName());
            $view->with(compact('title'));
        });

        Blade::if('request', function ($url) {
            return request()->is($url);
        });
        View::composer(['front.layout', 'detailsproducts.show', 'products.show'], function ($view) {
            $view->with([
                'cartCount' => Cart::getTotalQuantity(),
                'cartTotal' => Cart::getTotal(),
            ]);
        });
    }
}