<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Jiajiri Online</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations-extended.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light scrolling-navbar white">
            <div class="container ">
                <div class="float-left mr-2"> </div>
                @if (Auth::user())
                    @if (Auth::user()->role == 'consultant')
                        <a class="navbar-brand font-weight-bold blue-text"
                            href="/consultant"><strong>JIAJIRI.</strong></a>
                    @elseif(Auth::user()->role == 'freelancer')
                        <a class="navbar-brand font-weight-bold blue-text"
                            href="/freelancer"><strong>JIAJIRI.</strong></a>
                    @endif
                @endif

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                    aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="navbar-nav ml-auto">
                        @if (Auth::user())
                            @if (Auth::user()->role == 'consultant')
                                <li><a class="nav-link blue-text font-weight-bold hoverable"
                                        href="{{ url('consultant/jobrequest/') }}">
                                        Requests</a>
                                </li>
                                <li><a class="nav-link blue-text font-weight-bold hoverable"
                                        href="/consultant/apply">Applications</a></li>
                                <li><a class="nav-link blue-text font-weight-bold hoverable" href="/consultant/payment">Payments</a>
                                </li>
                            @elseif(Auth::user()->role == 'freelancer')
                                <li><a class="nav-link blue-text font-weight-bold hoverable"
                                        href="{{ url('/freelancer/category') }}">
                                        Categories</a>
                                </li>
                              
                                <li><a class="nav-link blue-text font-weight-bold hoverable" href="/freelancer/apply/show/">Payments</a>
                                </li>
                            @endif



                        @endif
                        <li class="nav-item dropdown ml-3">
                            @if (Auth::user())
                                <a class="nav-link dropdown-toggle blue-text font-weight-bold"
                                    id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="fas fa-user blue-text"></i>
                                    {{ Auth::user()->name }}
                                </a>
                            @else
                                <a class="nav-link dropdown-toggle blue-text font-weight-bold"
                                    id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="fas fa-user blue-text"></i> Profile </a>
                            @endif
                            <div class="dropdown-menu dropdown-menu-right dropdown-cyan"
                                aria-labelledby="navbarDropdownMenuLink-4">
                                @if (Auth::user())
                                    @if (Auth::user()->role == 'consultant')
                                        <a class="dropdown-item waves-effect waves-light" href="/consultant/profile">My
                                            account</a>
                                    @elseif(Auth::user()->role == 'freelancer')
                                        <a class="dropdown-item waves-effect waves-light" href="/freelancer/profile">My
                                            account</a>
                                    @endif
                                    <a class="dropdown-item waves-effect waves-light" href="{{ route('logout') }} "
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="/logout" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @else
                                    <a class="dropdown-item waves-effect waves-light"
                                        href="{{ route('login') }}">Login</a>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    @yield('content')



    <footer class=" text-center text-md-left  pt-0 ">
        <div class="footer-copyright py-3 text-center">
            <div class="container-fluid"> © 2023 Jiajiri. </a> </div>
        </div>
    </footer>

    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/mdb.min.js') }}"></script>
    <script>
        new WOW().init();
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>

    <script>
        $(".button-collapse").sideNav();
        var container = document.querySelector(".custom-scrollbar");
        var ps = new PerfectScrollbar(container, {
            wheelSpeed: 2,
            wheelPropagation: true,
            minScrollbarLength: 20,
        });
        $("#btnTopLeft").on("click");
    </script>
</body>

</html>
