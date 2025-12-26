@extends('layouts.user')

@section('title','Beranda')

@section('content')

{{-- HERO --}}
<section class="hero-section text-light position-relative">
    <div class="hero-overlay"></div>

    <div class="container hero-content position-relative">
        <div class="row align-items-center min-vh-75">
            <div class="col-md-6">

                <h1 class="hero-title mb-4">
                    Sewa Gear Outdoor <br>
                    Kini Lebih Mudah!
                </h1>

                <div class="hero-points mb-4">
                    <span>
                        <i class="bi bi-check-circle-fill"></i>
                        Stok Real-Time & Lengkap
                    </span>
                    <span>
                        <i class="bi bi-check-circle-fill"></i>
                        Praktis & Cepat
                    </span>
                    <span>
                        <i class="bi bi-check-circle-fill"></i>
                        Layanan Jabodetabek
                    </span>
                </div>

                <a href="#produk" class="btn btn-success btn-lg hero-btn">
                    Lihat Peralatan
                </a>

            </div>
        </div>
    </div>
</section>

{{-- FLOATING SEARCH KATEGORI --}}
<section class="search-box-wrapper">
    <div class="container">
        <form method="GET" action="{{ route('home') }}"
              class="search-box shadow-lg rounded-5 bg-white d-flex align-items-center gap-4 px-4 py-3">

            {{-- KATEGORI --}}
            <div class="flex-fill">
                <label class="search-label">Kategori Peralatan</label>
                <select name="category_id" class="form-select border-0 p-2">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                            {{ $categoryId == $cat->id ? 'selected' : '' }}>
                            {{ $cat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- BUTTON --}}
            <button type="submit" class="btn btn-success btn-search rounded-4">
                <i class="bi bi-search me-1"></i> Cari
            </button>

        </form>
    </div>
</section>


{{-- PILIHAN BRAND --}}
<section class="container py-5">
    <h3 class="fw-bold mb-1">Pilihan Brand</h3>
    <p class="text-muted mb-4">
        Dipilih dari merek terbaik untuk pengalaman terbaik.
    </p>

    <div class="row g-4 align-items-center">

        @php
        $brands = [
            [
                'name' => 'Eiger',
                'logo' => 'images/brands/eiger.svg'
            ],
            [
                'name' => 'Consina',
                'logo' => 'images/brands/consina.png'
            ],
            [
                'name' => 'Deuter',
                'logo' => 'images/brands/deuter.svg'
            ],
            [
                'name' => 'Nature',
                'logo' => 'images/brands/coleman.png'
            ],
            [
                'name' => 'Rei',
                'logo' => 'images/brands/rei.png'
            ],
            [
                'name' => 'The North Face',
                'logo' => 'images/brands/north.svg'
            ],
        ];
        @endphp

        @foreach($brands as $brand)
            <div class="col-6 col-md-4 col-lg-2 text-center">
                <div class="p-3 bg-white rounded-4 shadow-sm h-100 d-flex align-items-center justify-content-center">
                    <img src="{{ $brand['logo'] }}"
                         alt="{{ $brand['name'] }}"
                         class="img-fluid"
                         style="max-height:60px;">
                </div>
            </div>
        @endforeach

    </div>
</section>

{{-- MENGAPA MEMILIH KAMI --}}
<section class="why-us-section">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="why-title">Mengapa Memilih Narelo?</h2>
            <p class="why-subtitle">
                Kami menghadirkan pengalaman sewa alat camping yang aman,
                mudah, dan terpercaya untuk setiap petualanganmu.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-3 col-sm-6">
                <div class="why-card">
                    <div class="why-icon bg-success">
                        <i class="bi bi-patch-check-fill"></i>
                    </div>
                    <h6>Brand Terpercaya</h6>
                    <p>Peralatan dari brand outdoor ternama dan berkualitas.</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="why-card">
                    <div class="why-icon bg-success">
                        <i class="bi bi-tools"></i>
                    </div>
                    <h6>Alat Terawat</h6>
                    <p>Selalu dicek, dibersihkan, dan siap digunakan.</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="why-card">
                    <div class="why-icon bg-success">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <h6>Harga Transparan</h6>
                    <p>Tanpa biaya tersembunyi, jelas sejak awal.</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="why-card">
                    <div class="why-icon bg-success">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <h6>Proses Cepat</h6>
                    <p>Pilih alat, sewa, dan siap berpetualang.</p>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- PRODUK --}}
<section class="container py-5" id="produk">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">Pilihan Terbaik Minggu Ini!</h3>
            <p class="text-muted mb-0">
                Gear pilihan pendaki, siap temani petualanganmu.
            </p>
        </div>
    </div>

    <div class="row g-4">
        @foreach($items as $item)
            <div class="col-6 col-md-4 col-lg-3">

                <div class="card product-card h-100 border-0 shadow-sm rounded-4">

                    {{-- GAMBAR --}}
                    <div class="p-4 text-center">
                        <img src="{{ asset('storage/'.$item->image) }}"
                             alt="{{ $item->nama_item }}"
                             class="img-fluid"
                             style="max-height:180px; object-fit:contain;">
                    </div>

                    {{-- BODY --}}
                    <div class="card-body d-flex flex-column px-4 pt-0">

                        <h6 class="fw-semibold mb-2">
                            {{ $item->nama_item }}
                        </h6>

                        <p class="text-muted small mb-3">
                            {{ \Illuminate\Support\Str::limit($item->deskripsi, 60) }}
                        </p>

                        <h6 class="fw-bold text-success mb-3">
                            Rp {{ number_format($item->harga_per_hari,0,',','.') }} / hari
                        </h6>

                        {{-- TOMBOL --}}
                        <a href="{{ route('user.item.show', $item->id) }}"
                           class="btn btn-outline-success w-100 mt-auto">
                            Detail &amp; Sewa
                        </a>

                    </div>
                </div>

            </div>
        @endforeach
    </div>

    {{-- PAGINATION --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $items->withQueryString()->fragment('produk')->links() }}
    </div>
</section>

{{-- TESTIMONI --}}
<section class="container py-5">

    <div class="text-center mb-5">
        <span class="badge rounded-pill px-4 py-2 bg-light text-dark fw-semibold">
            Testimoni
        </span>

        <h2 class="fw-bold mt-4">
            Apa kata mereka?
        </h2>
    </div>

    <div class="row g-4">

        {{-- TESTI 1 --}}
        <div class="col-md-4">
            <div class="testimonial-card h-100">
                <h5 class="fw-semibold mb-2">
                    Kualitas barang bagus
                </h5>

                <p class="text-muted">
                    Harganya affordable banget dan cocok di kantong
                    campers pemula.
                </p>

                <div class="d-flex align-items-center justify-content-between mt-4">
                    <div class="d-flex align-items-center gap-3">
                        <img src="images/nabila.jpeg"
                             class="rounded-circle"
                             width="48">
                        <strong>Nabilla Wulandari</strong>
                    </div>

                    <div class="rating">
                        ★★★★★
                    </div>
                </div>
            </div>
        </div>

        {{-- TESTI 2 --}}
        <div class="col-md-4">
            <div class="testimonial-card h-100">
                <h5 class="fw-semibold mb-2">
                    Proses cepat dan admin ramah
                </h5>

                <p class="text-muted">
                    Prosesnya cepat, adminnya ramah dan bisa ngasih
                    solusi peralatan bagi campers pemula.
                </p>

                <div class="d-flex align-items-center justify-content-between mt-4">
                    <div class="d-flex align-items-center gap-3">
                        <img src="images/revi.jpeg"
                             class="rounded-circle"
                             width="48">
                        <strong>Revi Febrianti</strong>
                    </div>

                    <div class="rating">
                        ★★★★★
                    </div>
                </div>
            </div>
        </div>

        {{-- TESTI 3 --}}
        <div class="col-md-4">
            <div class="testimonial-card h-100">
                <h5 class="fw-semibold mb-2">
                    Selalu jadi langganan
                </h5>

                <p class="text-muted">
                    Tidak pernah kecewa, langganan selalu di sini
                    karena kondisi barangnya bagus.
                </p>

                <div class="d-flex align-items-center justify-content-between mt-4">
                    <div class="d-flex align-items-center gap-3">
                        <img src="images/leo.png"
                             class="rounded-circle"
                             width="48">
                        <strong>Leony Selly Siringo Ringo</strong>
                    </div>

                    <div class="rating">
                        ★★★★★
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>





{{-- STYLE --}}
<style>
/* =========================
   HERO SECTION
========================= */
.hero-section {
    background: url('/images/hero.jpg') center/cover no-repeat;
    position: relative;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        90deg,
        rgba(15, 45, 30, 0.85) 0%,
        rgba(15, 45, 30, 0.65) 40%,
        rgba(15, 45, 30, 0.3) 70%,
        rgba(15, 45, 30, 0) 100%
    );
}

.min-vh-75 {
    min-height: 75vh;
}

.hero-title {
    font-size: 3rem;
    font-weight: 800;
    line-height: 1.2;
    letter-spacing: -0.5px;
}

.hero-points {
    display: flex;
    flex-wrap: wrap;
    gap: 18px;
    font-size: 1rem;
    color: #d4f5e3;
}

.hero-points i {
    color: #2ecc71;
    margin-right: 6px;
}

.hero-btn {
    margin-top: 10px;
    padding: 12px 28px;
    border-radius: 12px;
    font-weight: 600;
}

/* MOBILE */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.2rem;
    }

    .hero-points {
        gap: 12px;
        font-size: 0.95rem;
    }
}

.search-box-wrapper {
    margin-top: -70px;
    position: relative;
    z-index: 5;
}
/* FLOATING SEARCH KATEGORI */
.search-box-wrapper {
    margin-top: -60px;
    position: relative;
    z-index: 10;
}

.search-box {
    min-height: 80px;
}

.search-label {
    font-size: 12px;
    font-weight: 600;
    color: #6c757d;
}

.search-box select {
    font-size: 16px;
    font-weight: 500;
}

.btn-search {
    padding: 14px 26px;
    font-weight: 600;
}

.brand-card { transition:.3s; }
.brand-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0,0,0,.1);
}
/* PRODUCT CARD HOVER EFFECT */
.product-card {
    transition: 
        transform 0.35s ease,
        box-shadow 0.35s ease;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 24px 48px rgba(0, 0, 0, 0.12);
}

/* Tombol ikut hidup saat hover */
.product-card:hover .btn {
    background-color: #198754;
    color: #fff;
}

/* =========================
   MENGAPA MEMILIH KAMI
========================= */
.why-us-section {
    padding: 80px 0;
    background: linear-gradient(180deg, #f8fdf9, #ffffff);
}

.why-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1c3d2e;
}

.why-subtitle {
    max-width: 600px;
    margin: 12px auto 0;
    color: #6c757d;
    font-size: 1rem;
}

.why-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 30px 22px;
    text-align: center;
    box-shadow: 0 12px 30px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
    height: 100%;
}

.why-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.10);
}

.why-icon {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    color: #fff;
    font-size: 1.4rem;
}

.why-card h6 {
    font-weight: 700;
    margin-bottom: 8px;
    color: #1c3d2e;
}

.why-card p {
    font-size: 0.9rem;
    color: #6c757d;
    margin-bottom: 0;
}


.best-card {
    background:#fff;
    border-radius:18px;
    border:1px solid #eee;
    transition:.25s;
}
.best-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(0,0,0,.08);
}
.best-img {
    height:180px;
    display:flex;
    align-items:center;
    justify-content:center;
}
.best-img img {
    max-height:160px;
    object-fit:contain;
}
.testimonial-card {
    background: #fff;
    border-radius: 18px;
    padding: 28px;
    box-shadow: 0 10px 30px rgba(0,0,0,.06);
    transition: .3s;
}

.testimonial-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(0,0,0,.1);
}

.rating {
    color: #4ade80; /* hijau */
    font-size: 18px;
    letter-spacing: 2px;
}



</style>

@endsection
