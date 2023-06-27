<div>
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

        <!--  start section filter/shop  -->

        <section class="row" id="layout">
            <div class="col-lg-2 offset-lg-2 my-2 ms-auto me-3">
                <div class="d-flex justify-content-evenly">

                    <!--   Off-canvas Mobile filter  -->
                    <div class="d-lg-none me-auto">
                        <button aria-controls="offcanvasExample" class="btn btn-secondary px-3 ff-pm"
                                data-bs-target="#offcanvasExample"
                                data-bs-toggle="offcanvas" type="button">
                            Filter
                        </button>
                        <div aria-labelledby="offcanvasExampleLabel" wire:ignore.self class="offcanvas offcanvas-start" id="offcanvasExample"
                             tabindex="-1">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title ff-pm fs-3" id="offcanvasExampleLabel"><u>Filter</u></h5>
                                <button aria-label="Close" class="btn-close" data-bs-dismiss="offcanvas"
                                        type="button"></button>
                            </div>
                            <div  class="offcanvas-body">
                                <div class="mt-3">
                                    <p class=" ff-pr fs-4">
                                        <u>Gender</u>
                                    </p>
                                    <select wire:model="genderValue" class="form-control w-80 mx-auto mb-3" id="genderValue" name="gender">
                                        <option class="ms-3 ff-pr" value="" selected>All Genders</option>
                                        @foreach($genders as $gender)
                                            <option class="ms-3 ff-pr" value="{{ $gender->id }}">{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <p class="ff-pr fs-4 mb-1 pt-3">
                                        <u>Brand</u>
                                    </p>
                                    <select wire:model="brandValue" class="form-control w-80 mx-auto mb-3" id="brandValue" name="brand">
                                        <option class="ms-3 ff-pr" value="" selected>All Brands</option>
                                        @foreach($brands as $brand)
                                            <option class="ms-3 ff-pr" value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="py-3">
                                    <header class="ff-pr fs-4 pb-3">
                                        <h4>
                                            <u>Price Range</u>
                                        </h4>
                                    </header>
                                    <div class="my-3 w-75 mx-auto" data-role="rangeslider">
                                        <div class="py-3 d-flex">
                                            <p class="pe-2 fs-5">Max Price Selected: </p>
                                            <p class="ff-pm fs-5">@if($newValue) &euro; {{ $newValue }}@endif</p>
                                        </div>
                                        <input wire:input="tryChange" wire:model="priceValue" type="range" class="form-range" max="{{ $priceMax }}" step="10" id="customRange2">
                                        <div class="d-flex justify-content-between">
                                            <p class="fs-6 ff-pm">{{ $minPrice }}</p>
                                            <p>{{ $priceMax }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  End off-canvas Mobile filter  -->

                    <!-- start Sort button -->
                    <div class="d-flex align-items-baseline">
                        <div>
                            <select class="cstm-btn ff-pm" wire:model="sortBy" id="sort">
                                <option class="ms-3 ff-pr" value="" selected >Sort By</option>
                                <option class="ms-3 ff-pr" value="name">Name @if($sortDirection === "asc")(A-Z) @else() (Z-A) @endif</option>
                                <option class="ms-3 ff-pr" value="price">Price @if($sortDirection === "asc")(Asc) @else() (Desc) @endif</option>
                            </select>
                        </div>
                        <div class="back-primary p-2 rounded ms-3u" wire:click="changeSortDirection" style="cursor: pointer" class="ms-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- End sort button -->
            </div>

            <!-- Start filter Lg screen -->
            <div class="col-lg-12 d-lg-flex">
                <div class="d-none d-lg-block col-lg-3 py-3 ms-5">
                    <div class="back-primary w-75 py-5 rounded-3 ff-pm">
                        <div class="offcanvas-header">
                            <h5 class="ff-pm fs-3 mx-auto"><u>Filter</u></h5>
                        </div>
                        <div>
                            <p class="ff-pr fs-4 mb-1 ms-3">
                                <u>Search</u>
                            </p>
                            <input class="form-control mx-auto w-80 mb-3" type="text" placeholder="Search Product..." name="productSearch" wire:model.debounce.500ms="productSearch">
                        </div>
                        <div class="mt-3 pb-3">
                            <p class="ff-pr fs-4 ms-3">
                                <u>Gender</u>
                            </p>
                            <select wire:model="genderValue" class="form-control w-80 mx-auto mb-3" id="genderValue" name="gender">
                                <option class="ms-3 ff-pr" value="" selected>All Genders</option>
                                @foreach($genders as $gender)
                                    <option class="ms-3 ff-pr" value="{{ $gender->id }}">{{ $gender->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <p class="ff-pr fs-4 mb-1 ms-3">
                                <u>Brand</u>
                            </p>
                            <select wire:model="brandValue" class="form-control w-80 mx-auto mb-3" id="brandValue" name="brand">
                                <option class="ms-3 ff-pr" value="" selected>All Brands</option>
                                @foreach($brands as $brand)
                                    <option class="ms-3 ff-pr" value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="py-3">
                            <header class="ff-pr fs-4 pb-3 ms-3">
                                <h4>
                                    <u>Price Range</u>
                                </h4>
                            </header>
                            <div class="my-3 w-75 mx-auto" data-role="rangeslider">
                                <div class="py-3 d-flex">
                                    <p class="pe-2 fs-5">Max Price Selected: </p>
                                    <p class="ff-pm fs-5">@if($newValue) &euro; {{ $newValue }}@endif</p>
                                </div>
                                <input wire:input="tryChange" wire:model="priceValue" type="range" class="form-range" max="{{ $priceMax }}" step="10" id="customRange2">
                                <div class="d-flex justify-content-between">
                                    <p class="fs-6 ff-pm">{{ $minPrice }}</p>
                                    <p>{{ $priceMax }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End filter Lg screen -->

                <!-- Start Product Cards -->
                <div class="col-lg-8">
                    <div class="row row-cols-1 justify-content-center row-cols-md-2 row-cols-lg-4 row-cols-xxl-5 gap-4">
                        @foreach ($products as $product)
                            <livewire:shop-products :product="$product" wire:key="$product.{{ $product->id }}"/>
                        @endforeach
                    </div>
                </div>
                <!-- End Product Cards-->
            </div>

        </section>
        <!--  end section filter/shop  -->
    </main>

</div>
