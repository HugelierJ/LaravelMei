@extends('layouts.frontend')
@section('content')
    <!-- Start Header -->
    <header>
        <!--  Start Navbar  -->
        @include('components.frontend_navbar')
        <!--  End Navbar  -->
    </header>
    <!-- End Header-->

    <!-- Start Top Button -->
    <button id="myBtn" onclick="topFunction()"><i class="bi bi-chevron-up fs-4"></i></button>
    <!-- End Top Button -->

    <main>
        <!--  Extra space if enough time  -->

        <!-- Start Section Detail-->
        <section class="row bg-light" id="detail">
            <div class="col-12 p-0">
                <header class="text-center py-5 bg-header">
                    <h2 class="ff-pl fs-1 py-5">
                        <u>Product Details</u>
                    </h2>
                </header>
            </div>
            <div class="col-lg-10 offset-lg-1 d-md-flex justify-content-evenly py-5">
                <div>
                    <img alt="men shoes" class="img-fluid" src="{{ $product->photo ? $product->photo->file : "https://via.placeholder.com/75" }}">
                </div>
                <div class="w-md-50 pt-4 pt-md-0 ps-4">
                    <h3 class="pb-2 ff-pm fs-3">{{ $product->name }}</h3>
                    <p class="pb-2 ff-pm fs-5">{{ $product->body }}</p>
                    <form id="addCart" method="post" action="{{ route("shop.add", $product) }}">
                        @csrf
                        @method("POST")
                        <select class="form-control mb-3 ff-pm fs-5 w-md-50" required id="shoeSize" name="shoeSize">
                            <option class="ms-3 ff-pr" disabled selected>Shoe Size</option>
                            <option class="ms-3 ff-pr" value="36">36</option>
                            <option class="ms-3 ff-pr" value="37">37</option>
                            <option class="ms-3 ff-pr" value="38">38</option>
                            <option class="ms-3 ff-pr" value="39">39</option>
                            <option class="ms-3 ff-pr" value="40">40</option>
                            <option class="ms-3 ff-pr" value="41">41</option>
                            <option class="ms-3 ff-pr" value="42">42</option>
                            <option class="ms-3 ff-pr" value="43">43</option>
                            <option class="ms-3 ff-pr" value="44">44</option>
                            <option class="ms-3 ff-pr" value="45">45</option>
                        </select>
                        @error('shoeSize')
                        <p class="text-danger fs-5">{{$message}}</p>
                        @enderror
                        @if(!$product->stock == 0)
                            <div>
                                <p class="pb-2 ff-pm fs-5 mt-5">&euro; <span id="price">{{ $product->price }}</span> / {{ $product->name }}</p>
                                <p class="pb-2 ff-pm fs-5 mt-5">Total Price &euro; <span id="total-price">{{ $product->price }}</span></p>
                            </div>
                            <div class="input-group mb-3 w-md-50">
                                <button type="button" id="decrement" class="cstm-btn"><i class="bi bi-dash"></i></button>
                                <input name="quantity" id="quantity" class="form-control" type="number" value="1" min="1" max="{{$product->stock}}">
                                <button type="button" id="increment" class="cstm-btn"><i class="bi bi-plus"></i></button>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success ff-pm fs-5 mt-2">&plus; add to cart</button>
                                @else
                                    <p class="text-danger ff-pm fs-5 mt-2">Sorry! we're temporary out of stock</p>
                                @endif
                            </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- End Section Detail-->
    </main>
@endsection
