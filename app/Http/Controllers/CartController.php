<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //
    public function addToCart(Product $product)
    {
        Cart::add(
            $product->id,
            $product->name,
            request()->quantity,
            $product->price,
            ["shoesize" => request()->shoeSize]
        )->associate("App\Models\Product");

        //        if (!Auth::user()->cart) {
        //            $cart = new Cart();
        //            $cart->user_id = Auth::user()->id;
        //            $cart->save();
        //        } else {
        //            $cart = Auth::user()->cart;
        //        }
        //        $cartItem = new CartItem();
        //        $cartItem->cart_id = $cart->id;
        //        $cartItem->product_id = $product->id;
        //        $cartItem->quantity = request()->quantity;
        //        $cartItem->shoesize = request()->shoeSize;
        //        $cartItem->price = $product->price * request()->quantity;
        //        $cartItem->save();
        return redirect()->route("shop.index");
    }

    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);
        return back();
    }
}
