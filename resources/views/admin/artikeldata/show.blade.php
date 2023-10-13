@extends('layouts.admin')

@section('container')
    <h1 class="h2">Detail Artikel</h1>

    <!-- Tampilkan detail artikel -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <img src="{{ asset('storage/cover/' . $article->cover) }}" alt="Cover Artikel" class="img-fluid" width="200">
                <h2 class="card-title">{{ $article->judul }}</h2>
                <p>Tahun: {{ $article->tahun }}</p>
                <p>Kategori: {{ $article->kategori }}</p>
                <p>Deskripsi: {{ $article->deskripsi }}</p>
                <!-- Tautan untuk melihat file PDF -->
                <a href="{{ asset('storage/pdf/' . $article->pdf) }}" class="btn btn-primary" target="_blank">
                    Lihat PDF
                </a>
            </div>
        </div>
    </div>

    <div class="text-end mt-3">
        <a href="{{ route('artikeldata.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
