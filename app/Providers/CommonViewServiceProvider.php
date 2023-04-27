<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
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
        view()->composer(['admin/*'], function ($view) {
            $view->with([
                'usersCount' => User::count(),
                'postsCount' => Post::count()
            ]);
        });

        view()->composer(['home', 'post', 'category'], function ($view) {
            $postsTickers = Post::latest('created_at')
                ->take(6)
                ->get();
            $categories = Category::all();

            $view->with('postsTickers', $postsTickers);
            $view->with('categories', $categories);
        });

    }
}


