<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/simple.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="app-body">
        <x-jet-banner />

        <div class="min-h-screen flex flex-col">
            <!-- Top navigation -->
            <header class="site-header">
                <div class="container">
                    <div class="header-inner">
                        <a href="{{ url('/') }}" class="brand">
                            <span class="brand-mark">{{ strtoupper(substr(config('app.name', 'App'),0,1)) }}</span>
                            <span class="brand-name">{{ config('app.name', 'Laravel') }}</span>
                        </a>

                        <nav class="site-nav">
                            <a href="{{ url('/') }}">Home</a>
                            @auth
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            @endauth
                            @guest
                                <a href="{{ route('login') }}">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @else
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="link-button">Logout</button>
                                </form>
                            @endguest
                        </nav>

                        <div class="mobile-nav">@livewire('navigation-menu')</div>
                    </div>
                </div>
            </header>

            <!-- Main content -->
            <main class="site-main">
                {{-- Support both component slots (`$slot`) and Blade sections (`@section('content')`) --}}
                @hasSection('content')
                    @yield('content')
                @else
                    <div class="container main-inner">
                        <!-- Session / Flash message -->
                        @if (session('status'))
                            <div class="flash flash-success">{{ session('status') }}</div>
                        @endif

                        @if (isset($header))
                            <div class="page-header">{{ $header }}</div>
                        @endif

                        <div class="card">
                            {{ isset($slot) ? $slot : '' }}
                        </div>
                    </div>
                @endif
            </main>

            <!-- Footer -->
            <footer class="site-footer">
                <div class="container footer-inner">
                    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    <div class="footer-links">
                        <a href="#">Privacy</a>
                        <a href="#">Terms</a>
                    </div>
                </div>
            </footer>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
