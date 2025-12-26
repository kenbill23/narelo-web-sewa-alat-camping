@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row g-4">

        {{-- KOLOM KIRI : GAMBAR --}}
        <div class="col-md-6">
            <div class="border rounded p-3">

                {{-- GAMBAR UTAMA --}}
                <div class="position-relative">
                    <img src="{{ asset('storage/'.$item->image) }}"
                         class="img-fluid rounded w-100"
                         alt="{{ $item->nama_item }}">
                </div>

            </div>
        </div>

        {{-- KOLOM KANAN : DETAIL --}}
        <div class="col-md-6">

            <h3 class="fw-bold">{{ $item->nama_item }} <span class="text-muted">(sewa)</span></h3>

            <h4 class="text-success mt-2">
                Rp {{ number_format($item->harga_per_hari,0,',','.') }}
                <small class="text-muted fs-6">/ hari</small>
            </h4>

            <hr>

            {{-- DESKRIPSI --}}
            <p class="fw-semibold mb-1">{{ $item->nama_item }}</p>

            <ul class="list-unstyled text-muted">
                <li><strong>Jenis:</strong> Produk sewa</li>
                <li><strong>Merek:</strong> Berbagai merek</li>
                <li><strong>Stok:</strong> {{ $item->stok }}</li>
                <li><strong>Deskripsi:</strong> {{ $item->deskripsi }}</li>
            </ul>

            {{-- JAM --}}
            <div class="row text-center my-3">
                <div class="col border p-2 rounded">
                    <small class="text-muted">Jam ambil</small><br>
                    <strong>09:00 WIB</strong>
                </div>
                <div class="col border p-2 rounded">
                    <small class="text-muted">Jam kembali</small><br>
                    <strong>18:00 WIB</strong>
                </div>
            </div>

            {{-- FORM SEWA --}}
            <form action="{{ route('user.sewa') }}" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="item_id" value="{{ $item->id }}">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <div class="d-flex gap-2">
                        <input type="date" name="tanggal_sewa" class="form-control" required>
                        <span class="align-self-center">→</span>
                        <input type="date" name="tanggal_kembali" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Jumlah</label>
                    <input type="number" name="qty" class="form-control" value="1" min="1">
                </div>

                <button class="btn btn-success w-100 py-2 fw-bold">
                    TAMBAH KE KERANJANG
                </button>
            </form>

        </div>

    </div>
</div>
@endsection
