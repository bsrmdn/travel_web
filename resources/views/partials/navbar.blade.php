<nav class="navbar navbar-expand-lg">
    <div class="container-fluid @if (Route::currentRouteName() == 'dashboard') fixed-top @else sticky-top @endif">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown text-end ms-auto">
                <a id="navbarDropdown" class="nav-link overflow-hidden img-thumbnail position-relative rounded-circle"
                    href="" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                    style="height:35px; width: 35px;">
                    <img src="{{ asset('img/default-profile.jpg') }}"
                        class="position-absolute h-100 w-auto top-50 start-50 translate-middle" alt="...">
                </a>

                <div class="dropdown-menu dropdown-menu-end z-1" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('home') }}">
                        <i class="bi bi-house"></i> {{ __('Home') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                        <i class="bi bi-person"></i> {{ __('Dashboard') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-left"></i> {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
