@extends("layouts.frontend")
@section('content')
<!-- Start Header -->
<header class="min-vh-100">
    <!--  Start Navbar  -->
    @include('components.frontend_navbar')
    <!--  End Navbar  -->

    <!--  Start HeroHeader  -->
    <div class="row">
        <div class="col-12 about-header vh-custom d-flex align-items-center">
            <div class="col-lg-10 offset-lg-1">
                <div class="text-center">
                    <h2 class="pb-3">
                        <u class="ff-psb fs-1 text-light">About Us</u>
                    </h2>
                    <p class="ff-pm fs-4 pt-5 text-light">
                        Wanna find out more about who we are and what services we offer?
                        <br>
                        scroll down and start reading.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--  End HeroHeader  -->
</header>
<!-- End Header-->

<!-- Start Top Button -->
<button id="myBtn" onclick="topFunction()"><i class="bi bi-chevron-up fs-4"></i></button>
<!-- End Top Button -->

<main>
    <!--  Extra space if enough time  -->

</main>
<!--  start section info  -->
<section class="row bg-light py-5" id="infoSection">
    <div class="col-10 offset-1 col-lg-8 offset-lg-2 my-5 bg-dark bg-opacity-25 rounded-3 p-5">
        <p class="ff-pr fs-4">
            WITH US, IT'S ALL ABOUT SHOES!
            Because we work closely with ultimate top brands, we can always offer the best, most exclusive product
            ranges. At Swingman Shoes, we live for shoes, we breathe shoes, we dream about shoes... We only think about
            shoes and nothing makes us happier than constantly updating our fans on new trends.
        </p>
        <hr>
        <p class="ff-pr fs-4">
            Our collections have been put together by and for shoe fans for over 30 years. Only the best, most relevant
            and exciting products end up on our shelves and in our online catalogues. "If it's sold at Swingman Shoes,
            it's approved!" This is said about us. Whether you have loved shoes for years or are just looking for a new
            pair of shoes; Swingman Shoes has everything you need. From toe to toe. remember: most of our products
            cannot be found anywhere else!
        </p>
        <hr>
        <p class="ff-pr fs-4">
            Moreover, Swingman Shoes has become an indispensable part of the European street culture, shoe scene and
            sporty lifestyle. We always enjoy giving back to the community and are involved in countless events and
            happenings across Europe. Parties, sports competitions, social events, shoe shows... There's a Swingman
            Shoes event happening at any time.

            Stay informed and keep your footwear lifestyle alive with Swingman Shoes!
        </p>
    </div>
</section>
<!-- end section info -->

<!-- start section services -->
<section class="row py-5" id="myServices">
    <div class="col-10 offset-1 py-5">
        <div class="col-lg-4 offset-lg-4 mx-auto text-center pb-3">
            <h2 class="ff-pm fs-1">
                <u>Our Services</u>
            </h2>
        </div>
        <div class="row py-3 py-lg-5 justify-content-evenly align-items-center">
            <article class="col-lg-3 mb-5 text-center text-light shadow-lg rounded-4 bg-header">
                <i class="bi bi-truck display-1"></i>
                <header>
                    <h3 class="ff-psb">
                        Delivery Services
                    </h3>
                </header>
                <p class="ff-pm">We're able to guarantee you, if you order today, you'll receive the shoes tomorrow.</p>
            </article>
            <article class="col-lg-3 mb-5 text-center text-light shadow-lg rounded-4 bg-header">
                <i class="bi bi-arrow-left-right display-1"></i>
                <header>
                    <h3 class="ff-psb">
                        Shipping &amp; Return
                    </h3>
                </header>
                <p class="ff-pm">You've tried out our shoes but something went wrong? No problem!You can just send them
                    back with cashback.</p>
            </article>
            <article class="col-lg-3 mb-5 text-center text-light shadow-lg rounded-4 bg-header">
                <i class="bi bi-person display-1"></i>
                <header>
                    <h3 class="ff-psb">
                        Delivery Services
                    </h3>
                </header>
                <p class="ff-pm">We're able to guarantee you, if you order today, you'll receive the shoes tomorrow.</p>
            </article>
        </div>
    </div>
</section>
<!-- end section services -->

<!-- start section brands -->
<section class="row bg-secondary bg-opacity-50 py-5" id="brands">
    <div class="col-lg-4 offset-lg-4 py-3">
        <div>
            <header>
                <h3 class="text-center ff-pm">
                    These are some of the biggest brands we work with.
                </h3>
            </header>
        </div>
    </div>
    <div class="col-10 offset-1 col-lg-10 offset-lg-1 py-5">
        <div class="d-flex align-items-center justify-content-evenly gap-2">
            <div class="brand-style">
                <img alt="arber brand" class="brand-style" src="./images/andrea-ventura.png">
            </div>
            <div class="brand-style">
                <img alt="doucals brand" class="brand-style" src="./images/doucals.jpg">
            </div>
            <div class="brand-style">
                <img alt="geox brand" class="brand-style" src="./images/geox.png">
            </div>
            <div class="brand-style">
                <img alt="santoni brand" class="brand-style" src="./images/santoni.png">
            </div>
            <div class="brand-style">
                <img alt="hogan brand" class="brand-style" src="./images/hogan.jpg">
            </div>
        </div>
    </div>
</section>
<!-- end section brands-->
@endsection
