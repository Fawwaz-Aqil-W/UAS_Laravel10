{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi dulu Bos') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Udah dikirim ulang, Cek Lagi Bos.') }}
                        </div>
                    @endif

                    {{ __('Sebelum Membeli Mohon Verifikasi Email Anda terlebih dahulu.') }}
                    {{ __('Jika Anda Belum Mendapatkan Email Mohon Klik Resend') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}