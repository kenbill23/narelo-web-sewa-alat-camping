@php
    use App\Models\Transaction;
    use Illuminate\Support\Facades\Auth;

    $cartCount = Auth::check()
        ? Transaction::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->count()
        : 0;
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <!-- GOOGLE FONT : POPPINS -->
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

    <style>
        :root {
            --green-1: #F6F0D7;
            --green-2: #CFE3A3;
            --green-3: #A6B98A;
            --green-4: #8A9B6E;
            --green-main: #4F6F52;
        }

        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: var(--green-1);
            font-family: 'Karla', sans-serif;
        }


        main {
            flex: 1;
        }

        .btn-green {
            background-color: var(--green-main);
            color: #fff;
            border: none;
        }

        .btn-green:hover {
            background-color: var(--green-4);
            color: #fff;
        }

        .text-green {
            color: var(--green-main);
        }

        .bg-green {
            background-color: var(--green-main);
        }

        .bg-green-soft {
            background-color: var(--green-2);
        }

        .card-custom {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0,0,0,.08);
            background-color: #fff;
        }
        /* CART ICON */
        .cart-icon i {
            font-size: 22px;
            color: #fff;
        }

        /* BADGE MERAH */
        .cart-badge {
            position: absolute;
            top: -4px;
            right: -8px;
            background: #dc3545;
            color: #fff;
            font-size: 11px;
            font-weight: 600;
            min-width: 18px;
            height: 18px;
            line-height: 18px;
            text-align: center;
            border-radius: 50%;
        }

        /* HOVER EFFECT */
        .cart-icon:hover i {
            transform: scale(1.15);
        }

        .cart-icon i {
            transition: transform 0.2s ease;
        }

        /* =========================
        NAVBAR LINK ACTIVE & HOVER
        ========================= */
        .navbar .nav-link {
            color: #ffffff;
            padding: 8px 14px;
            border-radius: 10px;
            transition: all 0.25s ease;
        }

        /* hover */
        .navbar .nav-link:hover {
            background-color: rgba(255,255,255,0.18);
            color: #ffffff;
        }

        /* active page */
        .navbar .nav-link.active {
            background-color: rgba(0,0,0,0.28);
            color: #ffffff;
            font-weight: 600;
        }

        /* =========================
        DROPDOWN TOGGLE (MASUK)
        ========================= */
        .navbar .dropdown-toggle:hover {
            background-color: rgba(255,255,255,0.18);
            border-radius: 10px;
        }

        .navbar .dropdown-toggle.show {
            background-color: rgba(0,0,0,0.28);
            border-radius: 10px;
        }

        /* =========================
        CART ICON EFFECT
        ========================= */
        .cart-icon {
            padding: 8px 12px;
            border-radius: 10px;
        }

        .cart-icon:hover {
            background-color: rgba(255,255,255,0.18);
        }

        .cart-icon:active {
            background-color: rgba(0,0,0,0.28);
        }

        /* =========================
        FOOTER NARELO
        ========================= */
        .footer-narelo {
            background: #f5eddc;
            padding: 70px 0 30px;
            color: #1c3d2e;
            font-size: 0.95rem;
        }

        .footer-logo {
            width: 130px;
        }

        .footer-desc {
            color: #4f6f5f;
            line-height: 1.6;
            max-width: 320px;
        }

        .footer-title {
            font-weight: 700;
            margin-bottom: 16px;
        }

        .footer-links,
        .footer-info {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li,
        .footer-info li {
            margin-bottom: 10px;
        }

        .footer-links a {
            text-decoration: none;
            color: #1c3d2e;
            transition: 0.2s;
        }

        .footer-links a:hover {
            color: #198754;
        }

        .footer-info i {
            margin-right: 8px;
            color: #198754;
        }

        .footer-whatsapp {
            font-size: 1.1rem;
            margin-bottom: 12px;
        }

        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #198754;
            color: #fff;
            margin-right: 8px;
            font-size: 1.1rem;
            transition: 0.3s;
        }

        .footer-social a:hover {
            background: #146c43;
            transform: translateY(-3px);
        }

        .footer-divider {
            margin: 40px 0 20px;
            border-color: rgba(0,0,0,0.1);
        }

        .footer-bottom {
            text-align: center;
            font-size: 0.85rem;
            color: #6c757d;
        }

        /* MOBILE */
        @media (max-width: 768px) {
            .footer-desc {
                max-width: 100%;
            }
        }
        * {
            font-family: 'Karla', sans-serif !important;
        }


    </style>

    <meta charset="UTF-8">
    <title>@yield('title','NareloRent')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
    </style>
</head>
<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg shadow-sm"
     style="background-color: var(--green-main);">
    <div class="container">

        {{-- LOGO --}}
        <a class="navbar-brand fw-semibold text-white"
           href="{{ route('home') }}">
            <i class="bi bi-tree"></i> NareloAdventure
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarUser">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarUser">
            <ul class="navbar-nav ms-auto align-items-center gap-3">

                {{-- HOME --}}
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold
                    {{ request()->routeIs('home') ? 'active' : '' }}"
                    href="{{ route('home') }}">
                        Home
                    </a>
                </li>


                {{-- =====================
                   JIKA BELUM LOGIN
                ===================== --}}
                @guest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white d-flex align-items-center gap-1"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown">
                        <i class="bi bi-person-fill fs-5"></i>
                        Masuk
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i>
                                Login
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('register') }}">
                                <i class="bi bi-person-plus"></i>
                                Register
                            </a>
                        </li>
                    </ul>
                </li>
                @endguest

                {{-- =====================
                   JIKA SUDAH LOGIN
                ===================== --}}
                @auth
                {{-- CART --}}
                <li class="nav-item">
                    <a href="{{ route('user.riwayat') }}"
                    class="nav-link position-relative cart-icon
                    {{ request()->routeIs('user.riwayat') ? 'active' : '' }}"
                    title="Riwayat Penyewaan">
                        <i class="bi bi-cart3"></i>
                        <span class="cart-badge">
                            {{ $cartCount ?? 0 }}
                        </span>
                    </a>
                </li>


                {{-- USER + LOGOUT --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>



<!-- MAIN CONTENT -->
<main>
    @yield('content')
</main>

<footer class="footer-narelo">
    <div class="container">

        <div class="row gy-4">

            {{-- BRAND --}}
            <div class="col-md-4">
                <img src="{{ asset('images/narelo.jpeg') }}"
                     alt="Narelo Adventure"
                     class="footer-logo mb-3">

                <p class="footer-desc">
                    Narelo Adventure adalah layanan penyewaan alat
                    camping & hiking dengan perlengkapan terbaik
                    dari brand terpercaya untuk menemani petualanganmu.
                </p>
            </div>

            {{-- BANTUAN --}}
            <div class="col-md-3">
                <h6 class="footer-title">Layanan Bantuan</h6>
                <ul class="footer-info">
                    <li>
                        <i class="bi bi-geo-alt"></i>
                        Chicago, Illinois, Amerika Serikat
                    </li>
                    <li>
                        <i class="bi bi-clock"></i>
                        Setiap hari, 09:00 – 20:00 WIB
                    </li>
                    <li>
                        <i class="bi bi-envelope"></i>
                        nareloadventure@gmail.com
                    </li>
                </ul>
            </div>

            {{-- KONTAK --}}
            <div class="col-md-3">
                <h6 class="footer-title">Hubungi Kami</h6>
                <p class="footer-whatsapp">
                    <i class="bi bi-whatsapp"></i>
                    <strong>0899 9999 9999</strong>
                </p>

                <div class="footer-social">
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>

        </div>

        <hr class="footer-divider">

        <div class="footer-bottom">
            <span>© 2025 NARELO Adventure. All rights reserved.</span>
        </div>

    </div>
</footer>
<!-- Bootstrap JS (WAJIB UNTUK DROPDOWN) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
