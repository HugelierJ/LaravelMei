<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopControlller;
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
Route::get("/shop", [ShopControlller::class, "shop"])->name("shop.index");

//Frontend Global Filter
Route::get("/products/filter", [
    ProductsController::class,
    "filterByName",
])->name("products.filter");

//Frontend Shop Billing Details
//Route::get("/checkout", [HomeController::class, "checkout"])->name(
//    "shop.checkout"
//);
//Frontend Shop DetailPage
Route::get("/shop/{product:slug}", [ProductsController::class, "detail"])->name(
    "products.detail"
);
/* Old Routes */
Route::get("/contactus", [ContactController::class, "create"])->name(
    "contact.create"
);
Route::post("/contactus", [ContactController::class, "store"])->name(
    "contact.store"
);
//Webhook moet buiten de Auth anders krijg je een redirect error 302 in de CLI.
Route::post("/webhook", [ShopControlller::class, "webhook"])->name(
    "stripe.webhook"
);

// Routes for authenticated users
Route::group(["middleware" => ["auth"]], function () {
    //Frontend Shop Cart
    Route::get("/cart", [ShopControlller::class, "cart"])->name("shop.cart");
    Route::post("/product/{product}", [
        CartController::class,
        "addToCart",
    ])->name("shop.add");
    Route::delete("/removeItem/{cartitem}", [
        CartController::class,
        "removeFromCart",
    ])->name("shop.remove");
    Route::get("/checkout", [ShopControlller::class, "billing"])->name(
        "shop.billing"
    );
    // STRIPE ROUTES
    Route::get("/checkout-stripe", [ShopControlller::class, "checkout"])->name(
        "stripe.checkout"
    );
    Route::get("/checkout-success/", [ShopControlller::class, "success"])->name(
        "stripe.success"
    );
    Route::get("/checkout-cancel", [ShopControlller::class, "cancel"])->name(
        "stripe.cancel"
    );
});
/**Backend**/

//route for admins
Route::group(
    ["prefix" => "admin", "middleware" => ["auth", "verified", "admin"]],
    function () {
        //Address Route
        Route::resource("addresses", AddressController::class);
        //Back-end Home Route
        Route::get("/", [BackendController::class, "index"])->name("home");
        //Order Routes
        Route::resource("orders", OrderController::class);
        //Product Routes
        Route::resource("products", ProductsController::class);
        Route::get("products/brand/{id}", [
            ProductsController::class,
            "productsPerBrand",
        ])->name("admin.productsPerBrand");
        //Brand Routes
        Route::resource("brands", BrandsController::class);
        Route::post("brand/restore/{brand}", [
            BrandsController::class,
            "brandRestore",
        ])->name("admin.brandrestore");
        //ProductCategory Routes
        Route::resource("productcategories", ProductCategoryController::class);
        // User Routes
        Route::resource("users", AdminUsersController::class);
        Route::post("users/restore/{user}", [
            AdminUsersController::class,
            "userRestore",
        ])->name("admin.userrestore");
    }
);

//Bad request -> return fallback route ipv error
Route::fallback(function () {
    return redirect()->route("frontend.index");
});

Auth::routes(["verify" => true]);
