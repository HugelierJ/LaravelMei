<div>
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
                <form wire:submit.prevent="submitForm" method="GET">
                    @csrf
                    <div>
                        <h3 class="mt-3">
                            Billing Details
                        </h3>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="mb-3 w-50">
                            <label for="billingfn" class="form-label ff-pr">First Name</label>
                            <input wire:model="first_name" name="first_name" type="text" class="form-control" id="billingfn" value="{{ Auth::user()->first_name }}">
                            @error('first_name')
                            <p class="text-danger fs-6">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3 w-50">
                            <label for="billingln" class="form-label ff-pr">Last Name</label>
                            <input wire:model="last_name" name="last_name" type="text" class="form-control" id="billingln" value="{{ Auth::user()->last_name}}">
                            @error('last_name')
                            <p class="text-danger fs-6">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <p class="ff-pr">
                            State
                        </p>
                        <input wire:model="state" id="billingstate" name="state" class="form-control mb-3 ff-pr" value="{{ Auth::user()->addresses->first()->state }}">
                        @error('state')
                        <p class="text-danger fs-6">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <p class="ff-pr">
                            Street Name
                        </p>
                        <input wire:model="name" id="billingstate" name="name" class="form-control mb-3 ff-pr" value="{{ Auth::user()->addresses->first()->name }}">
                        @error('state')
                        <p class="text-danger fs-6">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="d-flex gap-3">
                        <div class="mb-3 w-50">
                            <label for="billingcity" class="form-label ff-pr">City</label>
                            <input wire:model="city" name="city" type="text" class="form-control" value="{{ Auth::user()->addresses->first()->city }}" id="billingcity">
                            @error('city')
                            <p class="text-danger fs-6">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3 w-50">
                            <label for="billingpostal" class="form-label ff-pr">Postcode / ZIP</label>
                            <input wire:model="zip_code" name="zip_code" type="number" class="form-control" value="{{ Auth::user()->addresses->first()->zip_code }}" id="billingpostal">
                            @error('zip_code')
                            <p class="text-danger fs-6">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="mb-3 w-50">
                            <label for="billingphone" class="form-label ff-pr">Phone Number</label>
                            <input wire:model="phone_number" name="phone_number" type="tel" class="form-control" id="billingphone">
                            @error('phone_number')
                            <p class="text-danger fs-6">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3 w-50">
                            <label for="billingmail" class="form-label ff-pr">Email Adress</label>
                            <input wire:model="email" name="email" type="email" class="form-control" id="billingmail" value="{{ Auth::user()->email }}">
                            @error('email')
                            <p class="text-danger fs-6">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
{{--                    <button type="submit" class="cstm-btn mb-3 ff-pr">Check</button>--}}
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
                            <p class="ff-pm fs-6">&euro; {{ Cart::subtotal() }}</p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="ff-pm fs-6">Total Price</p>
                            <p class="ff-pm fs-6">&euro; {{ Cart::subtotal() }}</p>
                        </div>
                        <form wire:submit.prevent action="{{ route("stripe.checkout") }}" method="POST">
                            @csrf
                            @method("POST")
                            <button wire:click="submitForm" class="btn btn-custom border-0 ff-pm fs-6">Go To Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!--  Extra space if enough time  -->
    </main>
</div>
