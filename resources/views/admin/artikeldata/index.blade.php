@extends('layouts.admin')

@section('container')

<h1 class="h2">Data Artikel</h1>

@if (session()->has('success'))
<div class="alert alert-success col-lg-12" role="alert">
    {{ session('success') }}
</div>
@endif

<!-- Your search form code goes here -->

<div class="table-responsive col-lg-12">
    <table class="table table-sm table-bordered table-hover border-dark text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Cover</th>
                <th>Judul</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($dataartikel as $dataartikel)
            <tr>
                <td>{{ ++$i }}</td>
                <td>
                    <img src="{{ asset('storage/cover/' . $dataartikel->cover) }}" alt="Cover Artikel" class="img-fluid" width="100">
                </td>
                <td>{{ $dataartikel->judul }}</td>
                <td>{{ $dataartikel->tahun }}</td>
                <td>{{ $dataartikel->kategori }}</td>
                <td>{{ $dataartikel->deskripsi }}</td>
                <td>{{ Auth::user()->username }}</td>
                <td>
                    <a href="{{ route('artikeldata.edit', $dataartikel->id) }}" class="badge bg-warning" onclick="return confirm('Apakah Anda Yakin?')">
                        <span>Edit</span>
                    </a>
                    <form action="{{ route('artikeldata.destroy', $dataartikel->id) }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Menghapus Data Ini Akan Mempengaruhi Data Lain, Anda Yakin?')">
                            <span>Hapus</span>
                        </button>
                    </form>
                    <!-- Tambahkan tautan ke file PDF -->
                    <a href="{{ asset('storage/pdf/' . $dataartikel->pdf) }}" class="badge bg-primary" target="_blank">
                        <span>Lihat PDF</span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="text-end">
    <a href="{{ route('artikeldata.create') }}" class="btn btn-primary mb-3">Buat Artikel Baru</a>
</div>

@endsection
