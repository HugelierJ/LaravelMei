<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function addToCart(Product $product)
    {
        if (!Auth::user()->cart) {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        } else {
            $cart = Auth::user()->cart;
        }
        $cartItem = new CartItem();
        $cartItem->cart_id = $cart->id;
        $cartItem->product_id = $product->id;
        $cartItem->quantity = request()->quantity;
        $cartItem->shoesize = request()->shoeSize;
        $cartItem->price = $product->price * request()->quantity;
        $cartItem->save();
        return redirect()->route("shop.index");
    }

    public function removeFromCart($id)
    {
        CartItem::findOrFail($id)->delete();
        return back();
    }
}
