@extends('layouts.admin')

@section('container')

<h1 class="h2">Data Kategori</h1>

@if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
    <form action="{{ route('category.index') }}" method="GET" class="form-inline">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari kategori">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
</div>
    @php
        $i = 0; // Initialize the $i variable
    @endphp
<div class="table-responsive col-lg-12">
    <table class="table table-sm table-bordered table-hover border-dark text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>nama kategori</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $category)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $category->nm_kategori }}</td>
                <td>{{ $category->deskripsi }}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="badge bg-warning" onclick="return confirm('Apakah Anda Yakin?')">
                        <span>Edit</span></a>

                        <form action="{{ route('category.destroy', $category->id) }}" method="post" class="d-inline">
                            
                            @method('delete')
                            @csrf

                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Menghapus Data Ini Akan Mempengaruhi Data Lain, Anda Yakin?')"><span>Delete</span></button>

                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-end">
        <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Buat Kategori Baru</a>
    </div>
</div>

@endsection