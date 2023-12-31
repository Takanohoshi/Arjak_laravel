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
                <img src="{{ asset('images/about.jpg') }}" alt="Gambar about" class="img-responsive" width="1500" height="400">
                <br>
                <!-- Deskripsi Teks -->
                <h5 class="justify-text">
                Since 2001 JakArt has held six festivals, four festivals in Jakarta and two traveling festivals, and has organized and staged 12 major productions in over 175 cities in four continents. 
                JakArt has held over 1800 performances in more than 800 locations, involving the participation of more than 3000 artists from 50 countries. JakArt has worked with more than 350 government and NGO organizations, foreign embassies, etc., 
                and has involved more than 2000 enthusiastic volunteers from all walks of life.  JakArt has received the endorsement of UNESCO and is  founding member of AAPAF (The Association of Asian Performing Arts Festivals). Presently JakArt holds the Vice-Chair of the Association.       
                </h5>
            </div>
            <br>
            <br>
            <br>
            <!-- Tambahkan div container untuk layout -->
            <div class="container-fluid">
                <div class="row">
                    <!-- Bagian kanan -->
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bold">More</h1>
                        <br>
                        <div class="d-flex align-items-start" style="height: 500px;">
                            <h5 class="justify-text">
                            JakArt Festival is the result of the combined efforts of an impressive number of individual artists and concerned citizens who have collectively come to the realization that some action is called for imminently. These same individuals have struggled for many years and to various degrees of success to address the concern of the lack of adequate educational and financial support (often due to lack of understanding of the important links between the arts and our everyday economic and social activities). In Jakarta, a city of 15 million people, most of the cultural projects and events address themselves to narrow and specialized audiences and seldom reach the wider public.
                            </h5>
                        </div>
                    </div>
                    <!-- Bagian Kanan -->
                    <div class="col-md-6">
                        <img src="{{ asset('images/project.png') }}" alt="Gambar about" class="img-responsive" width="907" height="800">
                </div>
            </div>

            <div class="text-center">
                <h3 class="display-5 fw-bold">Our Vision</h3>
                <br>
                <!-- Deskripsi Teks -->
                <h5 class="text-center">
                    The Arts can touch the heart of man, giving him the inspiration of life. The Arts give form to our expressions, create what we see, stimulate what we think, create our environment, design what we use, as well as stimulate creativity and change. As individuals we all have something to contribute to the Arts. When we draw this inspiration through our national heritage and create as an expression of our own culture, insignificance is better appreciated.
                </h5>
            </div>

            {{-- Container untuk Konten Dinamis --}}
            @yield('container')
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <footer class="footer mt-auto py-3">
            <div class="container">
                <div class="text-center">
                    &copy; 2023 JakArt
                </div>
            </div>
          </footer>
</body>