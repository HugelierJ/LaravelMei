<?php

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItunesController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductsController;
use App\Models\Post;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/** FRONTEND ROUTES **/

//Frontend Index
Route::get("/", [HomeController::class, "index"])->name("frontend.index");

//Frontend About
Route::get("/about", [HomeController::class, "about"])->name("about-us.index");

//Frontend Contactformulier
Route::get("/contact", [HomeController::class, "contact"])->name(
    "about-us.contact"
);
//Frontend Shop index
Route::get("/shop", [HomeController::class, "shop"])->name("shop.index");

//Frontend Shop Cart
Route::get("/cart", [HomeController::class, "cart"])->name("shop.cart");
Route::post("/product/{product}", [CartController::class, "addToCart"])->name(
    "shop.add"
);
route::get("/removeItem/{cartitem}", [
    CartController::class,
    "removeFromCart",
])->name("shop.remove");

//Frontend Shop Checkout
Route::get("/checkout", [HomeController::class, "checkout"])->name(
    "shop.checkout"
);

//Frontend Shop DetailPage
Route::get("/detail", [HomeController::class, "detailPage"])->name(
    "shop.detail"
);
Route::get("/shop/{product:slug}", [ProductsController::class, "detail"])->name(
    "products.detail"
);

/* Old Routes */
Route::get("contactformulier", [ContactController::class, "create"])->name(
    "contact.create"
);
Route::post("contactformulier", [ContactController::class, "store"])->name(
    "contact.store"
);
Route::get("/post/{post:slug}", [AdminPostsController::class, "post"])->name(
    "frontend.post"
);
Route::get("/category/{category:slug}", [
    AdminCategoriesController::class,
    "category",
])->name("category.category");
Route::get("/itunes", [ItunesController::class, "index"])->name("itunes.index");

/**Backend**/

Route::group(
    ["prefix" => "admin", "middleware" => ["auth", "verified"]],
    function () {
        Route::get("/", [BackendController::class, "index"])->name("home");

        //    Post routes
        Route::resource("posts", AdminPostsController::class, [
            "except" => ["show"],
        ]);
        Route::get("posts/{post:slug}", [
            AdminPostsController::class,
            "show",
        ])->name("posts.show");
        Route::get("authors/{author:name}", [
            AdminPostsController::class,
            "indexByAuthor",
        ])->name("authors");
        Route::post("posts/restore/{post}", [
            AdminPostsController::class,
            "postRestore",
        ])->name("admin.postrestore");

        // Category routes
        Route::resource("categories", AdminCategoriesController::class);

        // Comment routes
        Route::resource("comments", CommentController::class);

        //Product Routes
        Route::resource("products", ProductsController::class);
        Route::get("products/brand/{id}", [
            ProductsController::class,
            "productsPerBrand",
        ])->name("admin.productsPerBrand");
        //Brand Routes
        Route::resource("brands", BrandsController::class);
        //ProductCategory Routes
        Route::resource("productcategories", ProductCategoryController::class);
        //Backend Admin Routes
        Route::group(["middleware" => "admin"], function () {
            Route::resource("users", AdminUsersController::class);
            Route::post("users/restore/{user}", [
                AdminUsersController::class,
                "userRestore",
            ])->name("admin.userrestore");
            Route::get("usersblade", [
                AdminUsersController::class,
                "index2",
            ])->name("users.index2");
        });
    }
);

Auth::routes(["verify" => true]);
