@include ('layouts.nav')
<title>Home</title>
<body>
    <br>
    <br>
<div class="container-fluid" style="border-bottom: 2px solid black;">
                    <div class="text-center">
                        <h1>WELCOME TO JAKART LIBRARY</h1>
                        <h3>"Creativity is a vehicle of development"</h3>
                    </div>

                    {{-- Container --}}
                    @yield('container')
                    
                </div>
                <br>
                <form action="{{ route('home') }}" method="GET" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari Artikel" maxlength="50">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <br>
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="card mb-4">
                                <img src="{{ asset('storage/cover/' . $item->cover) }}" class="card-img-top" alt="Image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->judul }}</h5>
                                    <p class="card-text">{{ $item->deskripsi }}</p>
                                    <p class="card-text" style="display: none;">Tahun: {{ $item->tahun }}</p>
                                    <p class="card-text" style="display: none;">Kategori: {{ $item->kategori }}</p>
                                    <p class="card-text" style="display: none;">Deskripsi: {{ $item->deskripsi }}</p>
                                    <a href="{{ asset('storage/pdf/' . $item->pdf) }}" class="btn btn-primary" style="display: none;">PDF</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Tambahkan event click pada gambar cover
                        $('.card-img-top').click(function() {
                            // Menampilkan atau menyembunyikan semua data dalam card yang sesuai
                            var cardBody = $(this).closest('.card').find('.card-body');
                            cardBody.find('p, a').toggle();
                        });
                    });
                </script>
                
</body>