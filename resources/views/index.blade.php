@extends("layouts.frontend")
@section('content')
<!-- Start Header -->
<header class="min-vh-100">

    <!--  Start Navbar  -->
    @include("components.frontend_navbar")
    <!--  End Navbar  -->

    <!-- Start Carousel -->
    <div class="row d-none d-md-block">
        <div class="col-lg-10 offset-lg-1 d-flex align-items-center justify-content-center py-5">
            <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleIndicators">
                <div class="carousel-inner back-primary">
                    <div class="carousel-item active" data-bs-interval="4000">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 offset-lg-1 d-flex align-items-center justify-content-between">
                                <div class="w-50 h-auto">
                                    <header class="pe-lg-5">
                                        <h2 class="ff-pm fs-1 my-lg-5"><u>Premium Men's Footwear</u></h2>
                                        <p class="ff-pm fs-4 pt-3 d-none d-md-block">
                                            Hop on the latest trend now, get your exclusive pair of premium shoes today!
                                        </p>
                                    </header>
                                </div>
                                <div class="w-50">
                                    <img alt="..." class=" card-img-top img-fluid d-none d-md-block h-auto"
                                         src="./images/men_footwear.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="4000">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 offset-lg-1 d-flex align-items-center justify-content-between">
                                <div class="w-50 h-auto">
                                    <header class="pe-lg-5">
                                        <h2 class="ff-pm fs-1 my-lg-5"><u>Premium Women's Footwear</u></h2>
                                        <p class="ff-pm fs-4 pt-3 d-none d-md-block">
                                            Hop on the latest trend now, get your exclusive pair of premium shoes today!
                                        </p>
                                    </header>
                                </div>
                                <div class="w-50">
                                    <img alt="..." class=" card-img-top img-fluid d-none d-md-block h-auto"
                                         src="./images/women_footwear.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="4000">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 offset-lg-1 d-flex align-items-center justify-content-between">
                                <div class="w-50 h-auto">
                                    <header class="pe-lg-5">
                                        <h2 class="ff-pm fs-1 my-lg-5"><u>Premium Children's Footwear</u></h2>
                                        <p class="ff-pm fs-4 pt-3 d-none d-md-block">
                                            Hop on the latest trend now, get your exclusive pair of premium shoes today!
                                        </p>
                                    </header>
                                </div>
                                <div class="w-50">
                                    <img alt="..." class=" card-img-top img-fluid d-none d-md-block h-auto"
                                         src="./images/kid_footwear.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-indicators">
                    <button aria-current="true" aria-label="Slide 1" class="active"
                            data-bs-slide-to="0" data-bs-target="#carouselExampleIndicators" type="button"></button>
                    <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators"
                            type="button"></button>
                    <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators"
                            type="button"></button>
                </div>
                <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators"
                        type="button">
                    <span aria-hidden="true" class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleIndicators"
                        type="button">
                    <span aria-hidden="true" class="carousel-control-next-icon"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <!--  End Carousel  -->

    <!-- Start Replacement carousel small screen  -->
    <div class="row d-md-none">
        <div class="col-lg-10 offset-lg-1  py-5">
            <div class="text-center">
                <header class="py-5">
                    <h2 class="ff-pm fs-2">
                        Premium Shoe's Now Available
                    </h2>
                </header>
                <p class="ff-pm fs-5">Scroll down for more info, or look at the shop to find the shoe that fits you!</p>
            </div>
        </div>
    </div>
    <!--  End replacement carousel small screen  -->

</header>
<!-- End Header-->

<!-- Start Top Button -->
<button onclick="topFunction()" id="myBtn"><i class="bi bi-chevron-up fs-4"></i></button>
<!-- End Top Button -->

<main>

    <!-- Section Categories -->
    <section class="row pb-3 bg-secondary bg-opacity-25" id="categories">
        <div class="col-12 p-0">
            <header class="text-center py-5 bg-header">
                <h2 class="ff-pl fs-1 py-4">
                    <u>Categories of the month</u>
                </h2>
            </header>
        </div>
        <div class="col-lg-10 offset-lg-1">
            <div class="d-lg-flex justify-content-evenly align-items-center pb-5 gap-4 gap-xl-0">
                <div class="card bg-gone text-center mx-auto" style="width: 18rem;">
                    <a class="mt-5" href="#">
                        <img alt="..." class="card-img-top rounded-circle" src="./images/men_footwear.jpg"></a>
                    <div class="card-body shadowclass mt-5">
                        <p class="card-text font-secondary ff-pr fs-5">Men's footwear</p>
                        <a href="#">
                            <button class="cstm-btn ff-pr fs-5">Visit Shop</button>
                        </a>
                    </div>
                </div>
                <div class="card bg-gone text-center mx-auto" style="width: 18rem;">
                    <a class="mt-5" href="#">
                        <img alt="..." class="card-img-top rounded-circle" src="./images/women_footwear.jpg">
                    </a>
                    <div class="card-body shadowclass mt-5">
                        <p class="card-text font-secondary ff-pr fs-5">Women's footwear</p>
                        <a href="#">
                            <button class="cstm-btn ff-pr fs-5">Visit Shop</button>
                        </a>
                    </div>
                </div>
                <div class="card bg-gone text-center mx-auto" style="width: 18rem;">
                    <a class="mt-5" href="#">
                        <img alt="..." class="card-img-top rounded-circle" src="./images/kid_footwear.jpg">
                    </a>
                    <div class="card-body shadowclass mt-5">
                        <p class="card-text font-secondary ff-pr fs-5">Kid's footwear</p>
                        <a href="#">
                            <button class="cstm-btn ff-pr fs-5">Visit Shop</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  End Section Categories  -->

    <!--  Section Featured Products  -->
    <section class="row bg-light bg-wave" id="featured">
        <div class="col-12 p-0">
            <header class="text-center py-5 bg-header">
                <h2 class="ff-pl fs-1 ">
                    <u>Featured Product</u>
                </h2>
                <p class="text-center ff-pm fs-4 pt-3">
                    This month featuring:
                </p>
            </header>
        </div>
        <div class="col-lg-10 offset-lg-1 py-5">
            <div class="d-lg-flex justify-content-evenly align-items-center py-5">
                <div class="card my-5 mx-auto" style="width: 18rem;">
                    <a href=""><img alt="..." class="card-img-top" src="https://via.placeholder.com/200x250.png"></a>
                    <div class="card-body">
                        <a href=""><i class="bi bi-star text-warning"></i></a>
                        <a href=""><i class="bi bi-star text-warning"></i></a>
                        <a href=""><i class="bi bi-star text-warning"></i></a>
                        <a href=""><i class="bi bi-star text-warning"></i></a>
                        <a href=""><i class="bi bi-star text-warning"></i></a>
                        <h5 class="card-title pt-2 ff-pm ">Name of product</h5>
                        <p class="card-text ff-pr ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In,
                            ipsum!</p>
                        <div class="d-flex justify-content-between align-items-baseline">
                            <a class="btn btn-custom ff-pr " href="#">Go somewhere</a>
                            <p class="ff-psb ">Price: 999&euro;</p>
                        </div>
                    </div>
                </div>
                <div class="card my-5 mx-auto" style="width: 18rem;">
                    <a href=""><img alt="..." class="card-img-top" src="https://via.placeholder.com/200x250.png"></a>
                    <div class="card-body">
                        <a href=""><i class="bi bi-star text-warning"></i></a>
                        <a href=""><i class="bi bi-star text-warning"></i></a>
                        <a href=""><i class="bi bi-star text-warning"></i></a>
                        <a href=""><i class="bi bi-star text-warning"></i></a>
                        <a href=""><i class="bi bi-star text-warning"></i></a>
                        <h5 class="card-title pt-2 ff-pm ">Name of product</h5>
                        <p class="card-text ff-pr ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In,
                            ipsum!</p>
                        <div class="d-flex justify-content-between align-items-baseline">
                            <a class="btn btn-custom ff-pr " href="#">Go somewhere</a>
                            <p class="ff-psb ">Price: 999&euro;</p>
                        </div>
                    </div>
                </div>
                <div class="card my-5 mx-auto" style="width: 18rem;">
                    <a href="#"><img alt="..." class="card-img-top" src="https://via.placeholder.com/200x250.png"></a>
                    <div class="card-body">
                        <a href=""><i class="bi bi-star text-warning"></i></a>
                        <a href=""><i class="bi bi-star text-warning"></i></a>
                        <a href=""><i class="bi bi-star text-warning"></i></a>
                        <a href=""><i class="bi bi-star text-warning"></i></a>
                        <a href=""><i class="bi bi-star text-warning"></i></a>
                        <h5 class="card-title pt-2 ff-pm ">Name of product</h5>
                        <p class="card-text ff-pr ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In,
                            ipsum!</p>
                        <div class="d-flex justify-content-between align-items-baseline">
                            <a class="btn btn-custom ff-pr " href="#">Go somewhere</a>
                            <p class="ff-psb ">Price: 999&euro;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--  End Section Featured Products  -->

    <!--  Extra space if enough time  -->

</main>
@endsection
