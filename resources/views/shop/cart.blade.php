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
        <livewire:shoppingcart />
    </main>
@endsection
