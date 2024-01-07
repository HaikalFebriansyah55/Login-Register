<header class="p-3 bg-dark fixed-top" style="background-color: #040A11;">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <img src="{{ asset('img/Gameconn.png') }}" alt="Gameconn" width="100" height="30" class="me-2">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                <svg class="bi me-2 text-white" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 {{ $title === 'Home' ? 'active' : 'non' }}">Home</a></li>
                @auth
                    @if(Auth::user()->role == 'user')
                        <li><a href="/library" class="nav-link px-2 {{ $title === 'Library' ? 'active' : 'non' }} ">Library</a></li>
                    @endif
                @endauth
                @auth
                    @if(Auth::user()->role == 'admin')
                        <li><a href="/dashboard" class="nav-link px-2 {{ $title === 'Dashboard' ? 'active' : 'non' }}">Dashboard</a></li>
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
                    <li><a class="dropdown-item text-white bg-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            @endguest
</header> 