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
                @if($order->products())
                    @foreach($productOrders as $productOrder)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3>Order Id {{$order->id}}</h3>
                            </div>
                            <div class="card-body">
                                <p><strong>Order Product Id:</strong> {{$productOrder->pivot->product_id}}</p>
                                <p><strong>Order Product Shoesize:</strong> {{$productOrder->pivot->shoesize ?? "no shoesize"}}</p>
                                <p><strong>Order Product Quantity:</strong> {{$productOrder->pivot->quantity}}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <p><strong>Order Product Price:</strong> {{$productOrder->pivot->price}}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card w-100 d-flex justify-content-center align-items-center">
                        <p>No Parent Comment</p>
                    </div>
                    <div class="m-2 my-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-arrow-right-square-fill text-primary" viewBox="0 0 16 16">
                            <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                        </svg>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
