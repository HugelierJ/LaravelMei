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
                            <input class="form-control me-2" type="text" name="search" placeholder="Search by product name">
                            <button class="cstm-btn" type="submit">Search</button>
                        </div>

                    </form>

                    {{--                        @if(Auth::User())--}}
                    {{--                            <div class="btn fs-5 icon-box d-flex align-items-baseline justify-content-between">--}}
                    {{--                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">--}}
                    {{--                                      <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>--}}
                    {{--                                      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>--}}
                    {{--                                    </svg></span><p class="ff-pr p-0">{{ Auth::User()->name }}</p>--}}
                    {{--                            </div>--}}
                    {{--                        @else--}}
                    <div class="dropdown">
                        <button type="button"
                                class="btn fs-4 icon-box me-2 dropdown-toggle {{ Auth::User() == true ? "border-success" : "border-warning" }}"
                                data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor"
                                 class="bi bi-person-workspace {{ Auth::User() == true ? "text-success" : "text-warning" }}"
                                 viewBox="0 0 16 16">
                                <path
                                    d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                <path
                                    d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                            </svg>
                        </button>
                        @if(!Auth::User())
{{--                            <form class="dropdown-menu p-2">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label for="userEmail" class="form-label">Email address</label>--}}
{{--                                    <input type="email" class="form-control" id="userEmail"--}}
{{--                                           placeholder="email@example.com">--}}
{{--                                </div>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label for="userPassword" class="form-label">Password</label>--}}
{{--                                    <input type="password" class="form-control" id="userPassword"--}}
{{--                                           placeholder="Password">--}}
{{--                                </div>--}}
{{--                                <div class="d-flex justify-content-between">--}}
{{--                                    <a type="button" class="cstm-btn p-1" href="{{ route('register') }}">Register</a>--}}
{{--                                    <a type="button" class="cstm-btn p-1" href="{{ route('login') }}">Sign in</a>--}}
{{--                                </div>--}}

{{--                            </form>--}}
                            <form class="dropdown-menu" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                                               autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required
                                               autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="dropdown-menu p-2">
                                <div class="d-flex align-items-center">
                                    <img class="img-fluid" src="https://via.placeholder.com/40" alt="">
                                    <p class="pt-3 ms-3">{{ Auth::User()->name }}</p>
                                </div>
                                <a type="button" class="btn btn-warning p-1 no-style no-deco"
                                   href="{{ route('logout') }}">Logout</a>
                            </div>
                        @endif
                    </div>
                    {{--                        @endif--}}
                    <div>
                        @if($basket)
                        <a type="button" class="btn bi bi-basket icon-box fs-4 position-relative"
                           href="{{ route("shop.cart") }}">
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
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
