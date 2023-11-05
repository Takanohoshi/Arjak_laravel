@extends('layouts.admin')

@section('container')

<h1 class="h2">Data Karyawan</h1>

@if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
    <form action="{{ route('users.index') }}" method="GET" class="form-inline">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari dengan name, username, atau email">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
</div>
@php
    $i = 0;
    @endphp
        <div class="text-end">
            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Buat User Baru</a>
        </div>
<div class="table-responsive col-lg-12">
    <table class="table table-sm table-bordered table-hover border-dark text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td> {{ $user->level }} </td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="badge bg-warning" onclick="return confirm('Apakah Anda Yakin?')">
                        <span>Edit</span></a>

                        <form action="{{ route('users.destroy', $user->id) }}" method="post" class="d-inline">
                            
                            @method('delete')
                            @csrf

                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Menghapus Data Ini Akan Mempengaruhi Data Lain, Anda Yakin?')"><span>Delete</span></button>

                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    {{ $users->links() }}
</div>

@endsection