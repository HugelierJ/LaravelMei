@props(["basket"=>true])
<div class="row bg-secondary bg-opacity-25">
    <div class="col-lg-10 offset-lg-1 py-3">
        <nav class="navbar navbar-expand-lg py-3">
            <div class="container-fluid">
                <a class="navbar-brand fs-4 ff-psb" href="{{ route('frontend.index') }}">Swingman Shoes</a>
                <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                        class="navbar-toggler" data-bs-target="#navbarSupportedContent"
                        data-bs-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-2">
                            <a aria-current="page" class="nav-link fs-4 rounded  ff-pr"
                               href="{{ route('frontend.index') }}">Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link fs-4 rounded ff-pr" href="{{ route('about-us.index') }}">About</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link fs-4 rounded ff-pr" href="{{ route('shop.index') }}">Shop</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link fs-4 rounded ff-pr" href="{{ route('about-us.contact') }}">Contact</a>
                        </li>
                    </ul>
                    <form action="{{ route('products.filter') }}" method="GET">
                        @csrf
                        @method("GET")
                        <div class="d-flex me-3">
                            <input class="form-control me-2" type="text" name="search"
                                   placeholder="Search by product name">
                            <button class="cstm-btn" type="submit">Search</button>
                        </div>

                    </form>
                    @if(!Auth::user())
                        <div class="me-2">
                            <a href="{{ route('login') }}" type="button" class="btn icon-box"><span
                                    class="rounded p-2 border-dark ff-pm">Login</span></a>
                            <a class="btn icon-box" href="{{ route('register') }}"><span
                                    class="rounded p-2 border-dark ff-pm">Register</span></a>
                        </div>
                    @else
                        <div class="dropdown">
                            <a class="btn btn-secondary me-2 dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->first_name }}
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                @if(Auth::user()->isAdmin())
                                     <li><a class="dropdown-item" href="{{ route('home') }}">Backend</a></li>
                                @endif
                                {{--                                <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
                            </ul>
                        </div>
                    @endif
                    <div>
                        @if($basket)
                            <a type="button" class="btn bi bi-basket icon-box fs-4 position-relative"
                               href="{{ route("shop.cart") }}">
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <span class="visually-hidden">basket amount</span>
                                   {{ Cart::count() }}
                            </span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
