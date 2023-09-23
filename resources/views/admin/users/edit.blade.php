@extends('layouts.admin')

@section('container')
    
<h1 class="h2">Edit User</h1>

<div class="col-lg-8">
    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $user->name) }}" placeholder="Nama">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username', $user->username) }}" placeholder="Username">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus placeholder="Password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Role</label>
            <select name="role" id="role" class="form-select">
                @switch($user->role)
                    @case('hotel_guest')
                        <option selected value="hotel_guest">Hotel Guest</option>
                        <option value="administrator">Administrator</option>
                        <option value="receptionist">Receptionist</option>
                        @break
                    @case('administrator')
                        <option selected value="administrator">Administrator</option>
                        <option value="hotel_guest">Hotel Guest</option>
                        <option value="receptionist">Receptionist</option>
                        @break
                    @case('receptionist')
                        <option selected value="receptionist">Receptionist</option>
                        <option value="administrator">Administrator</option>
                        <option value="hotel_guest">Hotel Guest</option>
                        @break
                    @default
                        <option value=""></option>
                @endswitch
                
            </select>
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection