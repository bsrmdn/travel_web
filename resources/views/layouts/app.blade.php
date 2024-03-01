<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @auth
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <form class="d-flex border-bottom border-dark me-4" role="search">
                        <i class="bi bi-search align-self-center pe-2"> </i>
                        <input class="form-control search-form rounded-0 me-2 border-0 p-0 bg-transparent" type="search"
                            placeholder="Search book..." aria-label="Search" id="search">
                    </form>

                    <li class="nav-item d-flex">
                        <a href="#" class="align-self-center text-reset">
                            <i class="bi bi-handbag"></i>
                        </a>
                    </li>
                    <div class="vr bg-black my-1 mx-2 d-none d-lg-block"></div>
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown text-end ms-auto">
                            <a id="navbarDropdown"
                                class="nav-link overflow-hidden img-thumbnail position-relative rounded-circle" href="#"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                style="height:35px; width: 35px;">
                                {{-- {{ Auth::user()->name }} --}}
                                <img src="@if (auth()->user()->avatar) {{ asset('storage/' . auth()->user()->avatar) }} @else{{ asset('img/default-profile.jpg') }} @endif"
                                    class="position-absolute h-100 w-auto top-50 start-50 translate-middle" alt="...">
                            </a>

                            <div class="dropdown-menu dropdown-menu-end z-1" aria-labelledby="navbarDropdown">
                                {{-- <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="bi bi-person"></i> {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="/profile/{{ auth()->user()->username }}/edit">
                                    <i class="bi bi-pencil-square"></i> {{ __('Edit Profile') }}
                                </a> --}}
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-left"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        @endauth
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
