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

        <section id="checkout" class="row">
            <div class="col-12 p-0 bg-header py-5">
                <header class="text-center">
                    <h2>
                        <u>Check-out</u>
                    </h2>
                </header>
            </div>
        </section>

        <section id="billing" class="row">
            <div class="col-12 col-md-10 offset-md-1 mt-3 col-lg-6 offset-lg-3 mb-4 back-primary rounded-3">
                <form>
                    <div>
                        <h3 class="mt-3">
                            Billing Details
                        </h3>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="mb-3 w-50">
                            <label for="billingfn" class="form-label ff-pr">First Name</label>
                            <input type="text" class="form-control" id="billingfn">
                        </div>
                        <div class="mb-3 w-50">
                            <label for="billingln" class="form-label ff-pr">Last Name</label>
                            <input type="text" class="form-control" id="billingln">
                        </div>
                    </div>
                    <div>
                        <p class="ff-pr">
                            State / Country
                        </p>
                        <select id="billingcountry" class="form-control mb-3 ff-pr">
                            <option value="" selected hidden>Choose your country...</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Philippines">Philippines</option>
                            <option value="South Korea">South Korea</option>
                            <option value="Hongkong">Hongkong</option>
                            <option value="Japan">Japan</option>
                        </select>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="mb-3 w-50">
                            <label for="billingcity" class="form-label ff-pr">Town / City</label>
                            <input type="text" class="form-control" id="billingcity">
                        </div>
                        <div class="mb-3 w-50">
                            <label for="billingpostal" class="form-label ff-pr">Postcode / ZIP</label>
                            <input type="number" class="form-control" id="billingpostal">
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="mb-3 w-50">
                            <label for="billingphone" class="form-label ff-pr">Phone Number</label>
                            <input type="tel" class="form-control" id="billingphone">
                        </div>
                        <div class="mb-3 w-50">
                            <label for="billingmail" class="form-label ff-pr">Email Adress</label>
                            <input type="email" class="form-control" id="billingmail">
                        </div>
                    </div>
                    <button type="submit" class="cstm-btn mb-3 ff-pr">Submit</button>
                </form>
            </div>
        </section>

        <section id="payment" class="row">
            <div class="d-flex justify-content-center gap-3">
                <div class="col-6 col-md-4 col-lg-3 ms-0 mb-3 pt-2 back-primary rounded-3">
                    <div class="px-3">
                        <div>
                            <h3 class="ff-pm fs-4">
                                <u>Cart Total</u>
                            </h3>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="ff-pm fs-6">Item(s) Total:</p>
                            <p class="ff-pm fs-6">&euro; 170</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="ff-pm fs-6">Delivery Charge:</p>
                            <p class="ff-pm fs-6">Free</p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="ff-pm fs-6">Total Price</p>
                            <p class="ff-pm fs-6">&euro; 170</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-3 pt-2 back-primary rounded-3">
                    <div class="px-3">
                        <div>
                            <h3 class="ff-pm fs-4">
                                <u>Payment Methods</u>
                            </h3>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="form-check pb-3">
                                    <input class="form-check-input ff-pm fs-6" type="radio" name="flexRadioDefault" id="paypal">
                                    <label class="form-check-label ff-pm fs-6" for="paypal">
                                        Paypal
                                    </label>
                                </div>
                                <div class="form-check pb-3">
                                    <input class="form-check-input ff-pm fs-6" type="radio" name="flexRadioDefault" id="bancontact">
                                    <label class="form-check-label ff-pm fs-6" for="bancontact">
                                        Bancontact
                                    </label>
                                </div>
                                <div class="form-check pb-3">
                                    <input class="form-check-input ff-pm fs-6" type="radio" name="flexRadioDefault" id="sofort">
                                    <label class="form-check-label ff-pm fs-6" for="sofort">
                                        Sofort
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-2">
                            <button class="cstm-btn ff-pm fs-6">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--  Extra space if enough time  -->
    </main>
@endsection
