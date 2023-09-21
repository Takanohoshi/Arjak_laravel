@include ('layouts.nav')
<title>About</title>
<style>
    .justify-text {
        text-align: justify;
    }
    .img-responsive {
    display: block;
    max-width: 100%;
    height: auto;
}
</style>
<body>
    <br>
    <br>
            <div class="container-fluid">
            <!-- Judul Halaman "ABOUT US" -->
            <div class="text-center">
                <h1 class="display-5 fw-bold">ABOUT US</h1>
                <br>
                <!-- Gambar "Gambar about" -->
                <img src="{{ asset('images/anime.jpeg') }}" alt="Gambar about" class="img-responsive" width="907" height="400">
                <!-- Deskripsi Teks -->
                <h5 class="justify-text">
                    LOREM IPSUM GENERATOR
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </h5>
            </div>

            {{-- Container untuk Konten Dinamis --}}
            @yield('container')
        </div>
</body>