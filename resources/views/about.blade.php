@extends('layouts.app')

@section('title', 'About Us')

@section('header')
    <header class="bg-gambar py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">About Us</h1>
                <p class="lead fw-normal text-white-50 mb-0">Learn more about our restaurant and values</p>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="container py-5">
        <!-- Foto Profil Tim -->
        <h2 class="text-center mb-4">Owner Santap Rasa</h2>
        <div class="row text-center">
            <!-- Anggota 1 -->
            <div class="col-md-4 mb-4">
                <img src="{{ asset('https://cdn.discordapp.com/attachments/788590470346965032/1321456430263435357/IMG_20241019_013522_617.jpg?ex=676d4db4&is=676bfc34&hm=83819ad6d7058e3ec39176f5ac4ca8fde6cdfc2a93020ca338a3d4b0ac38f8c6&') }}" alt="Profile 1" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                <h5 class="mt-3">Anggota 1</h5>
                <p>Kevan Altaf Avanza</p>
            </div>
            <!-- Anggota 2 -->
            <div class="col-md-4 mb-4">
                <img src="{{ asset('https://cdn.discordapp.com/attachments/788590470346965032/1321457105932255283/WhatsApp_Image_2024-12-25_at_19.38.26_291cb5e9.jpg?ex=676d4e55&is=676bfcd5&hm=7c32238ce8d473bc2552be6c754c219cd91ecef29ec5b4d9d23206f3f02ca19f&') }}" alt="Profile 2" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                <h5 class="mt-3">Anggota 2</h5>
                <p>Nurul Santi Hafifah</p>
            </div>
            <!-- Anggota 3 -->
            <div class="col-md-4 mb-4">
                <img src="{{ asset('https://cdn.discordapp.com/attachments/788590470346965032/1321457377597198386/WhatsApp_Image_2024-12-25_at_19.39.40_5a813762.jpg?ex=676d4e96&is=676bfd16&hm=de8c0776e8638cb2d8b24c36c9c6412f3ad97ea004e2393567006640ac235a25&') }}" alt="Profile 3" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                <h5 class="mt-3">Anggota 3</h5>
                <p>Nisrina Putri Rajwa</p>
            </div>
            <!-- Anggota 4 -->
            <div class="col-md-4 mb-4">
                <img src="{{ asset('https://cdn.discordapp.com/attachments/788590470346965032/1321458640804122665/WhatsApp_Image_2024-12-25_at_19.44.10_9d02d173.jpg?ex=676d4fc3&is=676bfe43&hm=e2920b25dde7527b1dd82393639279b3f8048718c87ce5321b1225926e27d231&') }}" alt="Profile 4" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                <h5 class="mt-3">Anggota 4</h5>
                <p>Amelia Putri Pitana</p>
            </div>
            <!-- Anggota 5 -->
            <div class="col-md-4 mb-4">
                <img src="{{ asset('https://cdn.discordapp.com/attachments/788590470346965032/1321457582371508295/WhatsApp_Image_2024-12-25_at_19.39.55_deb1c843.jpg?ex=676d4ec7&is=676bfd47&hm=7e79c45dae94ea09aba254fdbad135af61d4273ae6a8ffbe93e87c0c1dc183a4&') }}" alt="Profile 5" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                <h5 class="mt-3">Anggota 5</h5>
                <p>Grace Tabitha Simanungkalit</p>
            </div>
            <!-- Anggota 6 -->
            <div class="col-md-4 mb-4">
                <img src="{{ asset('https://cdn.discordapp.com/attachments/788590470346965032/1321458463930449971/WhatsApp_Image_2024-12-25_at_19.43.28_66d1369b.jpg?ex=676d4f99&is=676bfe19&hm=d826d7c7bc8c4a019f3ba333e281c1a346b83e2d51e0e4c15ae5609a3dfb16e5&') }}" alt="Profile 6" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                <h5 class="mt-3">Anggota 6</h5>
                <p>Fawwaz Aqil Wafii</p>
            </div>
        </div>

        <p class="text-justify">Selamat datang di Santap Rasa, restoran keluarga yang menghadirkan kehangatan dan cita rasa autentik khas Cilegon. Kami percaya bahwa makanan bukan sekadar santapan, tetapi juga cara untuk mempererat hubungan dan menciptakan momen berharga bersama keluarga tercinta. Dengan resep yang diwariskan secara turun-temurun, kami mengolah setiap hidangan menggunakan bahan-bahan segar dan rempah pilihan, menghadirkan pengalaman kuliner yang tak hanya lezat tetapi juga penuh makna. Suasana restoran yang nyaman, ramah keluarga, dan penuh kehangatan menjadikan Santap Rasa tempat yang sempurna untuk berkumpul, berbagi cerita, dan menikmati kebersamaan. Kami berkomitmen untuk memberikan pelayanan terbaik, sehingga setiap kunjungan Anda menjadi kenangan yang istimewa. Terima kasih telah mempercayakan momen keluarga Anda kepada kami.
        </p>

        <h2>Contact Us</h2>
        <p>Address: Jl. Raya Informatika, Blok A, No. 5, Cilegon</p>
        <p>Email: santaprasa@restaurantapp.com</p>
        <p>Phone: +62 812-3456-7890</p>
    </div>
@endsection