<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OneTimeText' )}}</title>


    <!-- Styles -->

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- JS -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script async src="https://js.stripe.com/v3/pricing-table.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">OneTimeText</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i style="color: white; font-size: 21pt" class="bi bi-list" id="navbar-icon"></i>
                </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link btn btn-link" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn-lg" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ url('/membership') }}">Konto</a></li>
                                <li><a class="dropdown-item" href="{{ url('/billing-portal') }}">Abonnement</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ url('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-warning" href="{{ url('/pro') }}">Zu Pro wechseln</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>


<main>
    <div class="container">
        @include('partials.alerts')
        @yield('content')
    </div>
</main>
<footer class="mt-5 mb-4">
    <div class="text-center pt-5 pb-4">
        <h3>OneTimeText.</h3>
        <a class="nav-link d-inline" href="{{ url('/impressum') }}">Impressum</a> | <a class="nav-link d-inline" href="{{ url('/datenschutz') }}">Datenschutz</a> | <a class="nav-link d-inline" href="https://github.com/lukasboc/onetimetext" target="_blank">Github</a> | <a class="nav-link d-inline" href="{{ url('/contact') }}">Kontakt</a>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
