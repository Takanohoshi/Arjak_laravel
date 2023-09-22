@extends('layouts.login')

@section('container')
<div class="container col-xl-10 col-xxl-8">
    <div class="row align-items-center py-5">
    <h2 class="text-center mb-4">Login</h2>

        @if (session()->has('loginError'))
            <div class="alert alert-danger col-lg-10 mx-auto col-lg-5" role="alert">
                {{ session('loginError') }}
            </div>
        @endif

        @if (session()->has('loginberhasil'))
            <div class="alert alert-success col-lg-10 mx-auto col-lg-5" role="alert">
                {{ session('loginberhasil') }}
            </div>
        @endif

        <div class="col-lg-10 mx-auto col-lg-5">
            <form action="/post" method="POST" class="p-4 p-md-5 border rounded-3 bg-light" autocomplete="off">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" autofocus required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection
