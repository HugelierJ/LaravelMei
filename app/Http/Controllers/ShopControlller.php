<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShopControlller extends Controller
{
    public function checkout()
    {
        $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET"));
        $lineItems = [];
        $totalPrice = 0;
        $cartItems = Cart::content();
        foreach ($cartItems as $product) {
            $totalPrice += $product->price;
            $lineItems[] = [
                "price_data" => [
                    "currency" => env("CASHIER_CURRENCY"),
                    "product_data" => [
                        "name" => $product->name,
                        "description" => Str::limit($product->model->body, 50),
                    ],
                    "unit_amount" => $product->price * 100,
                ],
                "quantity" => $product->qty,
            ];
        }
        $checkout_session = $stripe->checkout->sessions->create([
            "line_items" => $lineItems,
            "mode" => "payment",
            "success_url" => route("stripe.success", [], true),
            "cancel_url" => route("stripe.cancel", [], true),
        ]);
        //        $order = new Order();
        //        $order->status = "unpaid";
        //        $order->total_price = $totalPrice;
        //        $order->session_id = $checkout_session->id;
        //        $order->save();

        return redirect($checkout_session->url);
    }
    public function success()
    {
    }
    public function cancel()
    {
    }
}
