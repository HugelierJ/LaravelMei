<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        request()->validate(
            [
                "shoeSize" => ["required"],
            ],
            ["shoeSize.required" => "You must choose a Shoesize."]
        );
        $cart = Cart::add(
            $product->id,
            $product->name,
            request()->quantity,
            $product->price,
            0,
            ["shoesize" => request()->shoeSize]
        )->associate("App\Models\Product");
        return redirect()->route("shop.index");
    }

    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);
        return back();
    }
}
