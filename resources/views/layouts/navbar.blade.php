<header class="p-3 bg-dark fixed-top" style="background-color: #040A11;">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                <svg class="bi me-2 text-white" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 link-secondary text-white">Home</a></li>
                @auth
                    @if(Auth::user()->role == 'user')
                        <li><a href="/about" class="nav-link px-2 link-body-emphasis text-light-emphasis">Library</a></li>
                        <li><a href="#" class="nav-link px-2 link-body-emphasis text-light-emphasis">Community</a></li> 
                    @endif
                @endauth
                @auth
                    @if(Auth::user()->role == 'admin')
                        <li><a href="#" class="nav-link px-2 link-body-emphasis text-light-emphasis">Admin Panel</a></li>
                    @endif
                @endauth
            </ul>

            @guest
            {{-- Tampilkan tombol login dan register jika pengguna belum login --}}
            <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
            @else
            {{-- Tampilkan dropdown jika pengguna sudah login --}}
            <div class="dropdown text-end">
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('img/'.Auth::user()->img)}}" alt="{{ auth()->user()->name }}" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small bg-dark">
                    <li><a class="dropdown-item text-white bg-dark" href="#">View my profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-white bg-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            @endguest
</header> 