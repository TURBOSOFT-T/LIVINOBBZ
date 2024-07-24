@include('front.head')

<link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
<!-- Spinner Start -->
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
</div>
<!-- Spinner End -->


<!-- Topbar Start -->
<div class="container-fluid bg-dark px-0">
    <div class="row g-0 d-none d-lg-flex">
        <div class="col-lg-6 ps-5 text-start">
            <div class="h-100 d-inline-flex align-items-center text-white">
                <span>Follow Us:</span>
                <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-lg-6 text-end">
            <div class="h-100 topbar-right d-inline-flex align-items-center text-white py-2 px-5">
                <span class="fs-5 fw-bold me-2"><i class="fa fa-phone-alt me-2"></i>Call Us:</span>
                <span class="fs-5 fw-bold">+216 52 906 805</span>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white fixed w-full navbar-light sticky-top py-0 pe-15 pos-f-t">
    <div class="col-lg-4 col-md-12 text-center text-lg-start">
        <a href="{{ route('home') }}" class="navbar-brand ps-5 me-10">
            <h3 {{-- class="text-white m-10" --}} class="fw-bold text-white m-0">@lang('LIVINOBBZ')</h3>
        </a>
    </div>
    {{-- <div class="col-lg-4 col-md-12 text-center text-lg-start">
        <a href="" class="navbar-brand m-0 p-0">
            <h1 class="fw-bold text-primary m-0"><img src="img/logo.png" alt="Logo"></i>@lang('LIVINOBBZ')
            </h1>

        </a>
    </div> --}}
    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <li {{ currentRoute('home') }}>
                <a href="{{ route('home') }}" class="nav-item nav-link" title="">@lang('Home')</a>
            </li>

            <li {{ currentRoute('contacts.create') }}>
                <a href="{{ route('contacts.create') }}" class="nav-item nav-link" title="">@lang('Contact')</a>
            </li>

            <li>
                <a href="{{url('AllProducts')}}" class="nav-item nav-link">@lang('Shopping')</a>
            </li>
            <li {{ currentRoute('news.create') }}>
                <a href="{{ route('news.create') }}" class="nav-item nav-link">Annonces</a>


                @guest
                @request('register')
            <li class="current">
                <a href="{{ request()->url() }}" class="nav-item nav-link">@lang('Register')</a>
            </li>
            @endrequest
            <li {{ currentRoute('login') }}>
                <a href="{{ route('login') }}" class="nav-item nav-link">@lang('Login')</a>
            </li>
            @request('forgot-password')
            <li class="current">
                <a href="{{ request()->url() }}" class="nav-item nav-link">@lang('Password')</a>
            </li>
            @endrequest
            @request('reset-password/*')
            <li class="current">
                <a href="{{ request()->url() }}" class="nav-item nav-link">@lang('Password')</a>
            </li>
            @endrequest
            @else
            @if(auth()->user()->role != 'user')
            <li>
                <a href="{{ url('admin') }}" class="nav-item nav-link active">@lang('Administration')</a>
            </li>
            @endif
            <li>
               {{--  <form action="{{ route('logout') }}" method="POST" hidden>
                    @csrf
                </form>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.previousElementSibling.submit();"
                    class="nav-item nav-link active">
                    @lang('Logout')
                </a> --}}
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                      <img src="/assets/images/{{ Auth::user()->image_path }}" class="rounded-circle img-fluid" style="width: 40px;"
                        alt="Avatar"></i>

                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                       {{--  <a class="dropdown-item" href="{{ url('settings')}}">Profile</a>
                        <a class="dropdown-item" href="/mydashboad">My Dashboad</a>
 --}}
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </li>
            @if(auth()->user())
            <li class="nav-item nav-link active">
                  <form class="d-flex">
                <a class="tooltipped" href="{{ route('panier.index') }}" data-position="bottom"
                    data-tooltip="Voir mon panier"><i class="bi-cart-fill me-1"></i>Panier ({{ count((array) session('cart')) }})
                    </a>
                </form>
               {{--  <div class="col-lg-12 col-sm-12 col-12 main-section">
                    <div class="dropdown">
                        <button type="button" class="btn btn-info" data-toggle="dropdown">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{
                                count((array) session('cart')) }}</span>
                        </button>


                        <div class="dropdown-menu">
                            <div class="row total-header-section">
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span
                                        class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>

                                </div>
                                @php $total = 0 @endphp
                                @foreach((array) session('cart') as $id => $details)
                                @php $total += $details['originalPrice'] * $details['quantity'] @endphp
                                @endforeach
                                <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                    <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                                </div>
                            </div>
                            @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img class="w-50" src="public/image/Products/{{ $details['image'] }}" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['name'] }}</p>
                                    <span class="price text-info"> ${{ $details['originalPrice'] }}</span> <span class="count">
                                        Quantity:{{
                                        $details['quantity'] }}</span>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                    <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </li>
            @endif





            @endguest




        </div>
        <a href="" class="btn btn-primary px-3 d-none d-lg-block">Publiez une annonce</a>
    </div>
</nav>
<!-- Navbar End -->

<!-- instructions in JavaScript block -->



