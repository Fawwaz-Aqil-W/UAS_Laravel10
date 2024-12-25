<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Restoran Khas Cilegon</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{ url('/') }}">Restoran Keluarga, Masakan Khas Cilegon</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a></li>
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
                        @if(Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                    @endif
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        </nav>
        <!-- Header-->
        <header class="bg-gambar py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">SANTAP RASA</h1>
                    <p class="lead fw-normal text-white-50 mb-0">"Kumpul Hangat, Rasa Lezat"</p>
                </div>
            </div>
        </header>
        <!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <!-- Category Navigation -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <div class="btn-group" role="group">
                        <a href="{{ route('home') }}" class="btn btn-outline-dark {{ !request('category') ? 'active' : '' }}">All</a>
                        <a href="{{ route('home', ['category' => 'food']) }}" class="btn btn-outline-dark {{ request('category') == 'food' ? 'active' : '' }}">Food</a>
                        <a href="{{ route('home', ['category' => 'beverage']) }}" class="btn btn-outline-dark {{ request('category') == 'beverage' ? 'active' : '' }}">Beverage</a>
                        <a href="{{ route('home', ['category' => 'other']) }}" class="btn btn-outline-dark {{ request('category') == 'other' ? 'active' : '' }}">Other</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($products as $product)
            <div class="col mb-5">
                <div class="card h-100">
                    @if($product->is_sale)
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    @endif
                    
                    <img class="card-img-top" src="{{ $product->image ?? 'https://dummyimage.com/450x300/dee2e6/6c757d.jpg' }}" alt="{{ $product->name }}" />
                    
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">{{ $product->name }}</h5>
                            <div class="small mb-1">{{ ucfirst($product->category) }}</div>
                            @if($product->sale_price)
                                <span class="text-muted text-decoration-line-through">Rp{{ number_format($product->price) }}</span>
                                Rp{{ number_format($product->sale_price) }}
                            @else
                                Rp{{ number_format($product->price) }}
                            @endif
                        </div>
                    </div>
                    
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            @auth
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-outline-dark mt-auto">Add to cart</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-dark mt-auto">Add to cart</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
       <!-- Footer -->
<footer class="py-5 bg-gambar2">
    <div class="container text-center text-white">
        <!-- Alamat -->
        <p class="mb-1">Alamat: Jl. Raya Informatika, Blok A, No. 5, Cilegon</p>
        
        <!-- Sosial Media -->
        <div class="social-icons mb-3">
            <a href="https://wa.me/yourwhatsappnumber" target="_blank" class="text-white mx-2">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="https://instagram.com/yourinstagram" target="_blank" class="text-white mx-2">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
        
        <!-- Copyright -->
        <p class="m-0">Copyright &copy; Kelompok 5 Punya</p>
        <p class="m-0 rahasia">FAWWAZ,KEVAN,GRACE,NUNU,RINA,AMEL</p>
    </div>
</footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
