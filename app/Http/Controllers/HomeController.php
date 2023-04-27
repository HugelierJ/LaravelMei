<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view("index");
    }
    public function about()
    {
        return view("about-us.index");
    }
    public function contact()
    {
        return view("about-us.contact");
    }
    public function shop()
    {
        return view("shop.index");
    }
    public function cart()
    {
        return view("shop.cart");
    }
    public function checkout()
    {
        return view("shop.checkout");
    }
    public function detail()
    {
        return view("shop.detail");
    }
}
