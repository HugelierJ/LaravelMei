<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware("auth");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //    public function index()
    //    {
    //       $posts = Post::with(['photo', 'categories'])->latest('created_at')->get();
    //        $postfeatured = Post::latest('created_at')->first();
    //        return view("index", compact('posts','postfeatured'));
    //    }
    public function index()
    {
        $featuredProducts = Product::with(["brand", "photo"])
            ->latest("created_at")
            ->take(3)
            ->get();
        return view("index", compact("featuredProducts"));
    }
    public function about()
    {
        return view("about-us.index");
    }
    public function contact()
    {
        return view("about-us.contact");
    }
    public function checkout()
    {
        return view("shop.checkout");
    }
}
