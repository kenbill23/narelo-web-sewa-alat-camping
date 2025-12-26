@extends('layouts.app')

@section('title','Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-header text-center">
                <h4>Login</h4>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                   

                    <button class="btn btn-primary w-100">
                        Login
                    </button>
                </form>

                <!-- 🔽 TAMBAHKAN INI -->
                <div class="text-center mt-3">
                    <span>Belum punya akun?</span>
                    <a href="{{ route('register') }}">Daftar di sini</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

