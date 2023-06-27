<footer>
    <!--  Start Footer  -->
    <section class="row bg-secondary bg-opacity-25 py-5 flex-column" id="footer">
        <div class="col-lg-6 offset-lg-3 mx-auto d-lg-flex justify-content-evenly">
            <div>
                <h3 class="ff-pr">
                    Swingmen&nbsp;Shoes
                </h3>
                <hr class="w-100 ">
                <div class="d-lg-flex align-items-baseline ">
                    <i class="bi bi-geo-alt me-3 fs-5"></i>
                    <p class="ff-pm fs-5">Oostnieuwkerksesteenweg 111, 8800 Roeselare</p>
                </div>
                <div class="d-lg-flex align-items-baseline">
                    <i class="bi bi-telephone-outbound-fill me-3  fs-5"></i>
                    <a class="mb-3 no-deco ff-pm font-secondary fs-5" href="tel:078353653">
                        Questions? 078 35 36 53
                    </a>
                </div>
                <div class="d-lg-flex align-items-baseline">
                    <i class="bi bi-envelope-at me-3  fs-5"></i>
                    <a class="mb-3 no-deco ff-pm font-secondary fs-5" href="mailto:info@syntrawest.be">
                        Click me to send a mail
                    </a>
                </div>
            </div>
            <div>
                <h3 class=" ff-pr">
                    Products
                </h3>
                <hr class="w-100 ">
                <div class="d-flex flex-column">
                    <a class="no-deco ff-pm font-secondary fs-5" href="{{ route("shop.index", "?genderValue=1") }}">Men shoe&apos;s</a>
                    <a class="no-deco ff-pm font-secondary fs-5" href="{{ route("shop.index", "?genderValue=2") }}">Women shoe&apos;s</a>
                </div>
            </div>
            <div>
                <h3 class=" ff-pr">
                    Further Info
                </h3>
                <hr class="w-100 ">
                <div class="d-flex flex-column">
                    <a class="no-deco ff-pm font-secondary fs-5" href="{{ route("frontend.index") }}">Home</a>
                    <a class="no-deco ff-pm font-secondary fs-5" href="{{ route("about-us.index") }}">About Us</a>
                    <a class="no-deco ff-pm font-secondary fs-5" href="{{ route("shop.index") }}">Shop Page</a>
                    <a class="no-deco ff-pm font-secondary fs-5" href="{{ route("about-us.contact") }}">Contact Page</a>
                </div>
            </div>
        </div>
        <hr class=" w-50 mx-auto my-3">
    </section>
    <!--  End Footer  -->
</footer>
{{--<script crossorigin="anonymous"--}}
{{--        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"--}}
{{--        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>--}}
<script src="{{ asset('/js/nouislider.js') }}"></script>
<script src="{{ asset('/js/wNumb.js') }}"></script>
<script src="{{ asset('/js/index.js') }}"></script>
@livewireScripts
</body>

</html>
