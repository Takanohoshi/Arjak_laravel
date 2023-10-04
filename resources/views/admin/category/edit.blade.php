@extends('layouts.admin')

@section('container')

<h1 class="h2">Edit Kategori</h1>

<div class="col-lg-8">
    <a href="{{ route('category.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nm_kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control @error('nm_kategori') is-invalid @enderror" id="nm_kategori" name="nm_kategori" required autofocus value="{{ $category->nm_kategori }}" placeholder="Nama Kategori">
            @error('nm_kategori')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" placeholder="Deskripsi">{{ $category->deskripsi }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Change Category</button>
    </form>
</div>

@endsection
