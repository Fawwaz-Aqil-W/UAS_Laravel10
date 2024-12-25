@extends('layouts.app')

@section('content')
<div class="container px-4 px-lg-5 mt-5">
    <div class="text-center">
        <h2 class="mb-4">Terima Kasih Telah Berbelanja di Resto Kami!</h2>
        <p class="mb-4">Semoga Harimu Menyenangkan, Jangan Lupa Mampir Lagi ya! :D.</p>
        
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Order Total</h5>
                <p class="card-text h3">Rp{{ number_format($total) }}</p>
            </div>
        </div>

        <a href="{{ route('home') }}" class="btn btn-primary">Back to Menu</a>
    </div>
</div>
@endsection