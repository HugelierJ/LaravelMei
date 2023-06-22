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


        <section id="detail" class="row">
            <div class="col-12 p-0 bg-header py-5">
                <header class="text-center">
                    <h2>
                        <u class="ff-pm">Contact Us</u>
                    </h2>
                </header>
            </div>
            <div class="col-12 col-lg-6 offset-lg-3">
                <form action="{{ route("contact.store") }}" method="post" class="form-control back-primary d-flex flex-column align-items-center my-5">
                    @csrf
                    @method("POST")
                        <div class="col-md-10 col-8 offset-2 offset-md-1">
                            <div class="gap-4 pt-3">
                                <div class="mb-3 form-floating">
                                    <input name="name" type="text" class="form-control" id="userFirstName" placeholder=" ">
                                    <label for="userFirstName" class="form-label ff-pr">name</label>
                                </div>
                            </div>
                            <div class="gap-4">
                                <div class="mb-3 form-floating w-100">
                                    <input name="email" type="email" class="form-control" id="userMail" placeholder=" ">
                                    <label for="userMail" class="form-label ff-pr">Email address</label>
                                </div>
                                <div class="mb-3">
                                    <label for="userQuestion">Question.</label>
                                    <textarea name="message" class="form-control ff-pr" placeholder="Leave a question here" id="userQuestion"></textarea>
                                </div>
                            </div>
                        </div>
                    <button type="submit" class="cstm-btn ff-pr">Ask Question.</button>
                </form>
            </div>
            <div class="col-12 col-lg-6 offset-lg-3 mb-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2513.779926826976!2d3.0972594157494187!3d50.94628287954683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c335bceb4d0467%3A0xa4ec8ad74209fbc5!2sSyntra%20West!5e0!3m2!1snl!2sbe!4v1671444966442!5m2!1snl!2sbe" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

        <!--  Extra space if enough time  -->
    </main>
@endsection
