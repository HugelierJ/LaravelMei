<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ShopControlller extends Controller
{
    public function billing()
    {
        return view("shop.checkout");
    }

    public function shop()
    {
        return view("shop.index");
    }

    public function cart()
    {
        $seeCartItems = Cart::content();

        return view("shop.cart", compact("seeCartItems"));
    }

    public function checkout(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET"));
        $lineItems = [];
        $totalPrice = 0;
        $cartItems = Cart::content();

        foreach ($cartItems as $product) {
            $totalPrice += $product->price * $product->qty;
            $lineItems[] = [
                "price_data" => [
                    "currency" => env("CASHIER_CURRENCY"),
                    "product_data" => [
                        "name" => $product->name,
                        "description" => Str::limit($product->model->body),
                    ],
                    "unit_amount" => $product->price * 100,
                ],
                "quantity" => $product->qty,
            ];
        }
        $stripe_request = $request->user()->checkout($lineItems, [
            "success_url" =>
                route("stripe.success") . "?session_id={CHECKOUT_SESSION_ID}",
            "cancel_url" =>
                route("stripe.cancel") . "?session_id={CHECKOUT_SESSION_ID}",
        ]);

        //Wegschrijven naar Billing tabel
        $billingInfo = Session::get("billingData");
        $billingDetails = new \App\Models\Billing();
        $billingDetails->billing_name =
            $billingInfo["first_name"] . " " . $billingInfo["last_name"];
        $billingDetails->billing_address = $billingInfo["street"];
        $billingDetails->billing_state = $billingInfo["state"];
        $billingDetails->billing_city = $billingInfo["city"];
        $billingDetails->billing_zip_code = $billingInfo["zip_code"];
        $billingDetails->billing_phone_number = $billingInfo["phone_number"];
        $billingDetails->billing_email = $billingInfo["email"];
        $billingDetails->save();
        Session::forget("billingData");

        //Wegschrijven naar Order tabel.
        $order = new Order();
        $order->billing_id = $billingDetails->id;
        $order->status = "unpaid";
        $order->total_price = $totalPrice;
        $order->session_id = $stripe_request->id;
        $order->save();

        //CartItems wegschrijven naar tussentabel.
        foreach ($cartItems as $product) {
            $order->products()->attach($product->id, [
                "price" => $product->price,
                "shoesize" => $product->options["shoesize"],
                "quantity" => $product->qty,
            ]);
            //Stock per product verminderen.
            $item = Product::findOrFail($product->id);
            $item->stock -= $product->qty;
            $item->save();
        }

        return redirect($stripe_request->url);
    }
    public function success(Request $request)
    {
        //Cart legen na successvolle checkout.
        Cart::destroy();

        //controleren of er een ingelogde user is.
        if (Auth::User()) {
            //de sessionId nemen vanuit de session van Stripe.
            $checkoutSession = $request
                ->user()
                ->stripe()
                ->checkout->sessions->retrieve($request->get("session_id"));
            //controleren of deze gevuld is.
            if ($checkoutSession) {
                //order ophalen aan de hand van de sessionId en de status veranderen naar betaald.
                $order = Order::where(
                    "session_id",
                    $checkoutSession->id
                )->first();
                $order->status = "paid";
                $order->payment_id = $checkoutSession->payment_intent;
                $order->update();
            }
        }

        return view("shop.checkout-success");
    }
    public function cancel(Request $request)
    {
        //controleren of er een ingelogde user is.
        if (Auth::User()) {
            //de sessionId nemen vanuit de session van Stripe.
            $checkoutSession = $request
                ->user()
                ->stripe()
                ->checkout->sessions->retrieve($request->get("session_id"));
            //controleren of deze gevuld is.
            if ($checkoutSession) {
                //order ophalen aan de hand van de sessionId en de status veranderen naar betaald.
                $order = Order::where(
                    "session_id",
                    $checkoutSession->id
                )->first();
                $order->status = "cancelled";
                $order->payment_id = $checkoutSession->payment_intent;
                $order->update();
            }
        }
        Cart::destroy();
        return view("shop.checkout-cancel", compact("order"));
    }

    public function webhook()
    {
        $endpoint_secret = env("STRIPE_WEBHOOK_SECRET");

        $payload = @file_get_contents("php://input");
        $event = null;
        if (Auth::user()) {
            try {
                $event = \Stripe\Event::constructFrom(
                    json_decode($payload, true)
                );
            } catch (\UnexpectedValueException $e) {
                // Invalid payload
            }
            if ($endpoint_secret) {
                // Only verify the event if there is an endpoint secret defined
                // Otherwise use the basic decoded event
                $sig_header = $_SERVER["HTTP_STRIPE_SIGNATURE"];
                try {
                    $event = \Stripe\Webhook::constructEvent(
                        $payload,
                        $sig_header,
                        $endpoint_secret
                    );
                } catch (\Stripe\Exception\SignatureVerificationException $e) {
                    // Invalid signature
                    return response("", 400);
                }
            }

            // Handle the event
            switch ($event->type) {
                case "checkout.session.completed":
                    $session = $event->data->object; // contains a \Stripe\PaymentIntent
                    $sessionId = $session->id;

                    $order = Order::where("session_id", $session->id)->first();

                    if ($order && $order->status === "unpaid") {
                        $order->status = "paid";
                        $order->save();
                        //send Email to customer.
                        Cart::destroy();
                    }
                    return response("", 200);
                // Then define and call a method to handle the successful payment intent.
                // handlePaymentIntentSucceeded($paymentIntent);
                default:
                    // Unexpected event type
                    error_log("Received unknown event type");
            }
            return response("", 200);
        }
        return response("", 200);
    }
}
