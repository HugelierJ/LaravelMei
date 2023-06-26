@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card shadow-lg mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <h3><strong>Order: {{$order->id}}</strong></h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Order Status:</strong> {{$order->status}}</p>
                    </div>
                    <div class="card-footer">
                        <p class="m-0"><strong>Order Price:</strong> {{$order->total_price}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                @foreach($productOrders as $productOrder)
                    <div class="card mb-3">
                        <div class="card-body">
                            <p><strong>Order Product Name:</strong> {{$productOrder->name}}</p>
                            <p><strong>Order Product Shoesize:</strong> {{$productOrder->pivot->shoesize ?? "no shoesize"}}</p>
                            <p><strong>Order Product Quantity:</strong> {{$productOrder->pivot->quantity}}</p>
                            <p><strong>Order Product Price:</strong>&euro; {{$productOrder->pivot->price}}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <p><strong>Order Product Price:</strong>&euro; {{$productOrder->pivot->price * $productOrder->pivot->quantity}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4">
                <div class="card shadow-lg mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <h3><strong>Billing-Info</strong></h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{$order->billing->name}}</p>
                        <p><strong>City:</strong> {{$order->billing->city}}</p>
                        <p><strong>State:</strong> {{$order->billing->state}}</p>
                        <p><strong>Street:</strong> {{$order->billing->address}}</p>
                        <p><strong>Zip Code:</strong> {{$order->billing->zip_code}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
