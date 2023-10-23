@extends('layouts.petugas')

@section('container')

<h1 class="h2">Edit data</h1>

<div class="col-lg-8">
    <a href="{{ route('datapetugas.index') }}" class="btn btn-secondary mb-3">Back</a>

   <form method="POST" action="{{ route('datapetugas.update', $dataartikel) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="cover">Cover:</label>
            <input type="file" class="form-control" id="cover" name="cover">
        </div>


        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $dataartikel->judul }}" required>
        </div>

        <div class="form-group">
            <label for="tahun">Tahun:</label>
            <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $dataartikel->tahun }}" required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $dataartikel->kategori }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required>{{ $dataartikel->deskripsi }}</textarea>
        </div>

        <div class="form-group">
            <label for="pdf">Detail:</label>
            <input type="file" class="form-control" id="pdf" name="pdf">
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

@endsection
