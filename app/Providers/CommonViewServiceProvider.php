<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class CommonViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer(["admin/*"], function ($view) {
            $view->with([
                "usersCount" => User::count(),
                "productCount" => Product::count(),
            ]);
        });
    }
}
