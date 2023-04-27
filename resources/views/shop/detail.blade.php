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
                    <img alt="men shoes" class="img-fluid" src="./images/men_footwear.jpg">
                </div>
                <div class="w-md-50 pt-4 pt-md-0 ps-4">
                    <h3 class="pb-2 ff-pm fs-3">Name of product</h3>
                    <p class="pb-2 ff-pm fs-5">description example: Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Adipisci cupiditate, dicta dolor earum ex nihil perspiciatis, provident quae repudiandae
                        sapiente sequi suscipit? Aliquam doloribus eaque eos iusto quis, ratione sed voluptates? Autem
                        consectetur eum laboriosam minus nobis obcaecati odio odit pariatur, quam quisquam repudiandae,
                        sapiente soluta temporibus unde vero voluptate!</p>
                    <select class="form-control mb-3 ff-pm fs-5 w-md-50" id="shoeSize" name="shoeSize">
                        <option class="ms-3 ff-pr" disabled selected>Shoe Size</option>
                        <option class="ms-3 ff-pr" value="1">40</option>
                        <option class="ms-3 ff-pr" value="2">41</option>
                        <option class="ms-3 ff-pr" value="3">42</option>
                        <option class="ms-3 ff-pr" value="4">43</option>
                        <option class="ms-3 ff-pr" value="5">44</option>
                        <option class="ms-3 ff-pr" value="5">45</option>
                        <option class="ms-3 ff-pr" value="5">46</option>
                    </select>
                    <div>
                        <p class="pb-2 ff-pm fs-5 mt-5">50 &euro;</p>
                    </div>
                    <div class="input-group mb-3 w-md-50">
                        <span class="cstm-btn"><i class="bi bi-dash"></i></span>
                        <input class="form-control" type="number" value="1" min="1">
                        <span class="cstm-btn"><i class="bi bi-plus"></i></span>
                    </div>
                    <div>
                        <button class="btn btn-success ff-pm fs-5 mt-2">&plus; add to cart</button>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section Detail-->
    </main>
@endsection
