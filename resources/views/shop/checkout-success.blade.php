@extends('layouts.frontend')

@section('content')
    <!-- Start Header -->
    <header>
        <!--  Start Navbar  -->
        <x-frontend_navbar basket="{{ false }}"></x-frontend_navbar>
        <!--  End Navbar  -->
    </header>
    <!-- End Header-->

    <!-- Start Top Button -->
    <button id="myBtn" onclick="topFunction()"><i class="bi bi-chevron-up fs-4"></i></button>
    <!-- End Top Button -->

    <main>
        <section id="cancelPage">
            <div class="row bg-header">
                <div class="col-lg-8 offset-lg-2 py-4">
                    <h1 class="ff-pm text-white text-center py-5">Success Page.</h1>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-2 text-center py-5">
                <h2 class="ff-pm py-2">Thank you for your order.</h2>
                <p class="ff-pm">You can click on the button below to go back to the shop.</p>
                <a class="cstm-btn" href="{{ route('shop.index') }}">Return to shop</a>
            </div>
        </section>
    </main>
@endsection
