<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\setting;
use App\Models\Subcategory;
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
       View::composer('*',function($view){
         $view->with('addToCartCount',Cart::where('ip_address',request()->ip())->count());
         $view->with('getProduct',Cart::where('ip_address',request()->ip())->with(['product'])->get());
         $view->with('getSetting',setting::first());
         $view->with('category',Category::with(['subCategory'])->get());
         $view->with('allSubcategory',Subcategory::get());
       });
    }
}
