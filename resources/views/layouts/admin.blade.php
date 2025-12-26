<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title','Admin Dashboard')</title>

    <!-- FONT MODERN ALAM -->
    <link href="https://fonts.googleapis.com/css2?family=Fauna+One&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Fauna One', serif;
            background-color: #0f1f17;
        }

        /* ========================= */
        /* SIDEBAR */
        /* ========================= */
        .sidebar {
            background: linear-gradient(180deg, #1b4332, #081c15);
        }

        .sidebar .nav-link {
            color: #e0f2f1;
            padding: 12px 16px;
            border-radius: 14px;
            font-weight: 500;
            transition: all .25s ease;
        }

        .sidebar .nav-link:hover {
            background: rgba(255,255,255,.15);
        }

        .sidebar .nav-link.active {
            background: #2d6a4f;
            font-weight: 600;
        }

        /* ========================= */
        /* TOPBAR */
        /* ========================= */
        .topbar {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
        }

        /* ========================= */
        /* BACKGROUND */
        /* ========================= */
        .content-wrapper {
            position: relative;
            min-height: calc(100vh - 64px);
            padding: 2rem;
            background-image: url('https://cdn.pixabay.com/photo/2018/09/13/10/36/mountains-3674334_1280.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .content-wrapper::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(
                rgba(25, 90, 45, 0.75),
                rgba(25, 90, 45, 0.45)
            );
            z-index: 0;
        }

        .content-wrapper > * {
            position: relative;
            z-index: 1;
        }

        /* ========================= */
        /* CARD & TABLE */
        /* ========================= */
        .card {
            border-radius: 20px;
            border: none;
            background: rgba(255,255,255,0.96);
            backdrop-filter: blur(12px);
        }

        .table {
            background: rgba(255,255,255,0.98);
            border-radius: 16px;
            overflow: hidden;
        }

        .table thead {
            background: #1b4332;
            color: #fff;
        }

        .table tbody tr:hover {
            background: rgba(45,106,79,.12);
        }

        /* ========================= */
        /* TEKS UMUM (BIARKAN) */
        /* ========================= */
        label,
        .form-label,
        .content-wrapper p,
        .content-wrapper span,
        .content-wrapper strong {
            color: #ffffff !important;
            font-weight: 600;
            text-shadow: 0 1px 3px rgba(0,0,0,0.5);
        }

        /* ===================================================== */
        /* ⭐ FINAL FIX KHUSUS INFO TRANSAKSI (NAMA PENYEWA) */
        /* ===================================================== */
        .detail-transaksi-info {
            margin-bottom: 12px;
        }

        .detail-transaksi-info .label {
            color: #d7efe3 !important;
            font-size: 15px;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0,0,0,0.6);
        }

        .detail-transaksi-info .value {
            color: #ffffff !important;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 0.4px;
            text-shadow: 0 3px 6px rgba(0,0,0,0.75);
        }

        /* ========================= */
        /* SIDEBAR CLEAN */
        /* ========================= */
        .sidebar ul,
        .sidebar li {
            list-style: none !important;
            padding-left: 0 !important;
            margin-left: 0 !important;
        }
    </style>
</head>

<body>
<div class="d-flex">

    <!-- SIDEBAR -->
    <aside class="sidebar text-white p-3" style="width:260px; min-height:100vh;">
        <h4 class="mb-4 text-center fw-bold">
            <i class="bi bi-tree-fill me-2"></i> NareloRent
        </h4>

        <ul class="nav flex-column gap-2">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                   class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}"
                   class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="bi bi-tags me-2"></i> Kategori
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.items.index') }}"
                   class="nav-link {{ request()->routeIs('admin.items.*') ? 'active' : '' }}">
                    <i class="bi bi-box-seam me-2"></i> Alat Hiking
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.transactions.index') }}"
                   class="nav-link {{ request()->routeIs('admin.transactions.*') ? 'active' : '' }}">
                    <i class="bi bi-receipt me-2"></i> Transaksi
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.reports') }}"
                   class="nav-link {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text me-2"></i> Laporan
                </a>
            </li>
        </ul>
    </aside>

    <!-- CONTENT -->
    <main class="flex-fill">
        <nav class="navbar topbar shadow-sm px-4 d-flex justify-content-between">
            <span class="fs-5 fw-semibold">@yield('page-title')</span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </nav>

        <div class="content-wrapper">
            @yield('content')
        </div>
         
    </main>

</div>
</body>
</html>
