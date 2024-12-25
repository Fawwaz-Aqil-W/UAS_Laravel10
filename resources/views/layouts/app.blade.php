<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title', 'Santap Rasa')</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{ url('/') }}">Restoran Keluarga, Masakan Khas Cilegon</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    </ul>
        
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
        
                    @auth
                        <a href="{{ route('cart.index') }}" class="btn btn-outline-dark">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">
                                {{ Auth::user()->cartItems()->count() }}
                            </span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-dark">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </a>
                    @endauth
                </div>
            </div>
        </nav>

        @yield('header')
        
        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

          <!-- Footer -->
    <footer class="py-5 bg-gambar2">
        <div class="container text-center text-white">
            <p class="mb-1">Alamat: Jl. Raya Informatika, Blok A, No. 5, Cilegon</p>
            <div class="social-icons mb-3">
                <a href="https://wa.me/yourwhatsappnumber" target="_blank" class="text-white mx-2">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://instagram.com/yourinstagram" target="_blank" class="text-white mx-2">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <p class="m-0">Copyright &copy; Kelompok 5 Punya</p>
            <p class="m-0 rahasia">FAWWAZ, KEVAN, GRACE, NUNU, RINA, AMEL</p>
        </div>
    </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>