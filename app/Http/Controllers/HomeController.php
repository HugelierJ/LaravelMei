<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Post;
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
        $brands = Brand::all();
        $products = Product::with([
            "keywords",
            "photo",
            "brand",
            "productcategories",
        ])->paginate(10);
        return view("shop.index", compact("products", "brands"));
    }
    public function cart()
    {
        $seeCartItems = Cart::content();

        return view("shop.cart", compact("seeCartItems"));
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
