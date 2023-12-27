<nav class="navbar navbar-dark navbar-expand-lg bg-danger">
    <div class="container">
        <a class="navbar-brand" href="#">Test Laravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Home' ? 'active' : ' ' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'About' ? 'active' : ' ' }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Blog' ? 'active' : ' ' }}" href="/blog">Blog</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    @if (auth()->user()->role == 'admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Welcome Back, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dashboard"><i
                                            class="bi bi-layout-text-sidebar-reverse"></i> My
                                        Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-left"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @elseif(auth()->user()->role == 'user')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Welcome Back, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-left"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                @else
                    <li class="nav-item {{ $title === 'Login' ? 'active' : '' }}">
                        <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                @endauth



        </div>
    </div>
</nav>
