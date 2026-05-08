<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'OneTimeText') }}</title>
    <script>
        (function () {
            var stored = localStorage.getItem('theme');
            var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            var theme = stored !== null ? stored : (prefersDark ? 'onetimetext' : 'onetimetext-light');
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script async src="https://js.stripe.com/v3/pricing-table.js"></script>
</head>
<body class="min-h-screen bg-base-100 text-base-content flex flex-col">

<div class="navbar bg-base-200 shadow-md px-4">
    <div class="navbar-start">
        <a class="btn btn-ghost text-xl font-bold tracking-tight" href="{{ url('/') }}">
            <x-icons.lock-closed class="size-5 text-primary" />
            OneTimeText
        </a>
    </div>

    {{-- Theme toggle (mobile) --}}
    <div class="navbar-center md:hidden">
        <label class="swap swap-rotate btn btn-ghost btn-circle btn-sm" title="Theme wechseln" id="theme-toggle-mobile-label">
            <input type="checkbox" id="theme-toggle-mobile" />
            <x-icons.sun class="swap-on size-5" />
            <x-icons.moon class="swap-off size-5" />
        </label>
    </div>

    {{-- Mobile hamburger --}}
    <div class="navbar-end md:hidden">
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost">
                <x-icons.bars-3 />
            </label>
            <ul tabindex="0" class="dropdown-content menu menu-sm bg-base-200 rounded-box z-50 mt-3 w-52 p-2 shadow">
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ url('/membership') }}">Konto</a></li>
                        <li><a href="{{ url('/billing-portal') }}">Abonnement</a></li>
                        <li>
                            <a href="{{ url('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                                Logout
                            </a>
                            <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                        </li>
                    @else
                        @if (Route::has('register'))
                            <li><a class="text-warning font-semibold" href="{{ url('/pro') }}">Zu Pro wechseln</a></li>
                        @endif
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>

    {{-- Desktop nav --}}
    <div class="navbar-end hidden md:flex gap-2 items-center">
        {{-- Theme toggle --}}
        <label class="swap swap-rotate btn btn-ghost btn-circle btn-sm" title="Theme wechseln">
            <input type="checkbox" id="theme-toggle" />
            <x-icons.sun class="swap-on size-5" />
            <x-icons.moon class="swap-off size-5" />
        </label>

        @if (Route::has('login'))
            @auth
                <a class="btn btn-ghost btn-sm" href="{{ url('/dashboard') }}">Dashboard</a>
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-sm btn-circle">
                        <x-icons.user-circle class="size-6" />
                    </label>
                    <ul tabindex="0" class="dropdown-content menu menu-sm bg-base-200 rounded-box z-50 mt-3 w-48 p-2 shadow">
                        <li><a href="{{ url('/membership') }}">Konto</a></li>
                        <li><a href="{{ url('/billing-portal') }}">Abonnement</a></li>
                        <li><hr class="my-1 border-base-300"></li>
                        <li>
                            <a href="{{ url('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                        </li>
                    </ul>
                </div>
            @else
                @if (Route::has('register'))
                    <a class="btn btn-ghost btn-sm text-warning" href="{{ url('/pro') }}">Zu Pro wechseln</a>
                @endif
                <a class="btn btn-primary btn-sm" href="{{ route('login') }}">Login</a>
            @endauth
        @endif
    </div>
</div>

<main class="flex-1 container mx-auto px-4 py-8 max-w-6xl">
    @include('partials.alerts')
    @yield('content')
</main>

<footer class="footer footer-center py-8 bg-base-200 text-base-content mt-auto">
    <div>
        <p class="text-xl font-bold tracking-tight mb-3">OneTimeText.</p>
        <div class="flex flex-wrap justify-center gap-x-4 gap-y-1 text-sm text-base-content/70">
            <a class="link link-hover" href="{{ url('/impressum') }}">Impressum</a>
            <span>|</span>
            <a class="link link-hover" href="{{ url('/datenschutz') }}">Datenschutz</a>
            <span>|</span>
            <a class="link link-hover" href="https://github.com/lukasboc/onetimetext" target="_blank">Github</a>
            <span>|</span>
            <a class="link link-hover" href="{{ url('/contact') }}">Kontakt</a>
        </div>
    </div>
</footer>

</body>
</html>
