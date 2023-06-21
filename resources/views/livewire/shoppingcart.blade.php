<div>
    <section id="cart" class="row">
        <div class="col-12 p-0 bg-header py-5">
            <header class="text-center">
                <h2>
                    <u>My Cart</u>
                </h2>
            </header>
        </div>
    </section>
    <section id="cart-header" class="row d-none d-md-block">
        <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 mt-5 mb-1 back-primary rounded-3">
            <div class="d-flex justify-content-between py-4">
                <div class="ff-pm fs-5 w-70 d-flex align-items-center">
                    <p class="ps-2 m-0">Product Info</p>
                </div>
                <div class="ff-pm fs-5 w-15">
                    <p class="m-0">Quantity <span class="">{{ Cart::count() }}</span></p>
                </div>
                <div class="ff-pm fs-5 ms-md-4 w-15 d-flex justify-content-center">
                    <p class=" pe-3 m-0">Total</p>
                </div>
            </div>
        </div>
    </section>
    <section id="cart-details" class="row">
        <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 mb-4 back-primary rounded-3">
            @foreach($cartitems as $cartitem)
                <livewire:shopping-cart-item :rowId="$cartitem->rowId" :wire:key="$cartitem->rowId"/>
            @endforeach
        </div>
    </section>
    <section id="cart-checkout" class="row">
        <div class="col-10 offset-1 col-lg-2 offset-lg-5 mb-3 pt-2 back-primary rounded-3">
            <div>
                <div class="d-flex justify-content-between">
                    <p class="ff-pm fs-6">Item(s) Total:</p>
                    <p class="ff-pm fs-6">&euro; {{ $total }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="ff-pm fs-6">Delivery Charge:</p>
                    <p class="ff-pm fs-6">Free</p>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <p class="ff-pm fs-6">Total Price</p>
                    <p class="ff-pm fs-6">&euro; {{ $total }}</p>
                </div>
                <div class="text-center mb-2">
                    <form action="{{ route("shop.billing") }}" method="GET">
                        @csrf
                        @method("GET")
                        @if(count(Cart::content()) <= 0)
                        <p class="ff-pm fs-6 text-danger">Make sure you have 1 item in your cart.</p>
                        @endif
                        <button class="btn btn-custom border-0 ff-pm fs-6 @if(count(Cart::content()) <= 0) disabled @endif ">Go To billing</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
