@extends('layouts.app')

@section('title','Login')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh">
    <div class="col-md-5">

        <div class="card border-0 shadow-lg rounded-4 p-4">
            <div class="text-center mb-4">
                <span class="badge rounded-pill px-4 py-2"
                      style="background:#dff7df;color:#000;">
                    Masuk
                </span>
                <h2 class="fw-bold mt-3">Selamat datang</h2>
            </div>

            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3 position-relative">
                    <i class="bi bi-person position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input type="email"
                           name="email"
                           class="form-control ps-5 rounded-3"
                           placeholder="Email / Username"
                           required>
                </div>

                <div class="mb-2 position-relative">
                    <i class="bi bi-lock position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input type="password"
                           name="password"
                           class="form-control ps-5 rounded-3"
                           placeholder="Password"
                           required>
                </div>

                <div class="mb-3 text-start">
                    <a href="{{ route('password.request') }}"
                       class="small text-muted">
                        Lupa password?
                    </a>
                </div>

                <button class="btn w-100 rounded-3 fw-semibold"
                        style="background:#7CFA77;height:48px;">
                    Masuk <i class="bi bi-arrow-right ms-2"></i>
                </button>
            </form>

            <div class="text-center mt-4 small">
                Belum punya akun?
                <a href="{{ route('register') }}" class="fw-semibold">
                    Ayo daftar jadi member!
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
