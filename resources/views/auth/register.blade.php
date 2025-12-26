@extends('layouts.app')

@section('title','Register')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh">
    <div class="col-md-5">

        <div class="card border-0 shadow-lg rounded-4 p-4">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Registrasi</h2>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3 position-relative">
                    <i class="bi bi-person position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input type="text"
                           name="name"
                           class="form-control ps-5 rounded-3"
                           placeholder="Username"
                           required>
                </div>

                <div class="mb-3 position-relative">
                    <i class="bi bi-envelope position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input type="email"
                           name="email"
                           class="form-control ps-5 rounded-3"
                           placeholder="Email"
                           required>
                </div>

                <div class="mb-3 position-relative">
                    <i class="bi bi-lock position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input type="password"
                           name="password"
                           class="form-control ps-5 rounded-3"
                           placeholder="Password"
                           required>
                </div>

                <div class="mb-4 position-relative">
                    <i class="bi bi-lock-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input type="password"
                           name="password_confirmation"
                           class="form-control ps-5 rounded-3"
                           placeholder="Konfirmasi password"
                           required>
                </div>

                <button class="btn w-100 rounded-3 fw-semibold"
                        style="background:#7CFA77;height:48px;">
                    Register <i class="bi bi-arrow-right ms-2"></i>
                </button>
            </form>

            <div class="text-center mt-4 small">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="fw-semibold">
                    Ayo login!
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
