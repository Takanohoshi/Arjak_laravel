@extends('layouts.admin')

@section('container')

<h1 class="h2">Edit Data Artikel</h1>

<div class="col-lg-8">
    <a href="{{ route('artikeldata.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <form action="{{ route('artikeldata.update', $dataartikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="cover" class="form-label">Cover Image</label>
            <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $dataartikel->judul }}">
        </div>

        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $dataartikel->tahun }}">
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori">
                <option value="" disabled>Pilih Kategori</option>
                @foreach ($category as $item)
                    <option value="{{ $item->nm_kategori }}" {{ $dataartikel->kategori == $item->nm_kategori ? 'selected' : '' }}>{{ $item->nm_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ $dataartikel->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Gambar Detail</label>
            <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

@endsection
