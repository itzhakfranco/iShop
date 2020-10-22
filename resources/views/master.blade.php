<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>{{ $title }}</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <link href="{{ asset('css/ui.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <script>
        const BASE_URL = "{{ url('') }}";

    </script>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm mb-1">
        <div class="container">
            <a class="navbar-brand" href="{{ url('') }}">iShop 2.0 </a><button class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @foreach ($menu as $item)
                        <li class="nav-item">
                            <a class="nav-link btn text-dark active" href="{{ url($item['url']) }}"
                                aria-current="page"><i class="fas fa-users mx-2"></i>{{ $item['link'] }}</a>
                        </li>
                    @endforeach
                </ul>

                <ul class="navbar-nav ml-auto">
                    @if (Session::get('is_admin'))
                        <li class="nav-item">
                            <a href="{{ url('cms/dashboard') }}" class="btn btn-dark mx-2">
                                <i class="fas fa-tachometer-alt"></i> CMS
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ url('shop/checkout') }}" class="btn btn-dark mx-2">
                            <i class="fas fa-shopping-cart"></i> Cart @if (!Cart::isEmpty())
                                <span class="badge badge-light ml-1">{{ Cart::getTotalQuantity() }}</span>
                            @endif
                        </a>
                    </li>
                    @if (!Session::has('user_id'))
                        <li class="nav-item">
                            <a href="{{ url('user/register') }}" class="btn btn-dark mx-2">
                                <i class="fas fa-user-plus"></i> Signup
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('user/signin') }}" class="btn btn-dark mx-2">
                                <i class="fas fa-sign-in-alt"></i> Signin
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ url('user/profile') }}" class="btn btn-dark mx-2">
                                <i class="far fa-id-badge"></i> {{ ucfirst(trans(Session::get('user_name'))) }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('user/logout') }}" class="btn btn-dark mx-2">
                                <i class="fas fa-sign-in-alt"></i> Logout
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>
    <nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse test2" id="main_nav">
                        <ul class="navbar-nav">
                            @foreach ($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ url('shop') . '/' . $category['url'] }}">{{ $category['cat_name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <form action="{{ url('shop/search') }}" method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="input-group input-group-search-term mb-1">
                            <input name="search_term" type="text" class="form-control search-term" placeholder="Search"
                                autocomplete="off" />
                            <div id="response"></div>

                            <div class="input-group-append">
                                <button type="sumbit" class="btn btn-primary search-btn" disabled="disabled">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @if (Session::has('msg'))
            <div class="container">
                <div class="row mt-3 msg-box">
                    <div class="col-md-12">
                        <div class="alert alert-success">{{ Session::get('msg') }}</div>
                    </div>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="container">
                <div class="row msg-box">
                    <div class="col-md-12 mt-3">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif @yield('main_content')
    </main>

    <footer class="section-footer border-top bg">
        <div class="container">
            <section class="footer-bottom row">
                <div class="col-12 text-center">
                    <span>iShop &copy; {{ date('Y') }}</span>
                </div>
            </section>
        </div>
    </footer>

    <!-- custom javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
</body>

</html>
