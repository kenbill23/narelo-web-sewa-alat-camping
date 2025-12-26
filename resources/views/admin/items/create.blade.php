@extends('layouts.admin')

@section('page-title','Tambah Alat Hiking')

@section('content')

{{-- ERROR VALIDASI --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data">
@csrf

{{-- NAMA ALAT --}}
<div class="mb-3">
    <label class="form-label">Nama Alat</label>
    <input type="text" name="nama_item" class="form-control"
           value="{{ old('nama_item') }}" required>
</div>

{{-- KATEGORI --}}
<div class="mb-3">
    <label class="form-label">Kategori</label>
    <select name="category_id" class="form-control" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($categories as $c)
            <option value="{{ $c->id }}"
                {{ old('category_id') == $c->id ? 'selected' : '' }}>
                {{ $c->nama_kategori }}
            </option>
        @endforeach
    </select>
</div>

{{-- DESKRIPSI --}}
<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi') }}</textarea>
</div>

{{-- STOK --}}
<div class="mb-3">
    <label class="form-label">Stok</label>
    <input type="number" name="stok" class="form-control"
           value="{{ old('stok') }}" required>
</div>

{{-- HARGA --}}
<div class="mb-3">
    <label class="form-label">Harga / Hari</label>
    <input type="number" name="harga_per_hari" class="form-control"
           value="{{ old('harga_per_hari') }}" required>
</div>

{{-- STATUS --}}
<div class="mb-3">
    <label class="form-label">Status Alat</label>
    <select name="status" class="form-control" required>
        <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>
            Tersedia
        </option>
        <option value="disewa" {{ old('status') == 'disewa' ? 'selected' : '' }}>
            Disewa
        </option>
        
    </select>
</div>

{{-- GAMBAR --}}
<div class="mb-3">
    <label class="form-label">Gambar Alat</label>
    <input type="file" name="image" class="form-control">
</div>

{{-- AKSI --}}
<div class="mt-4">
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.items.index') }}" class="btn btn-secondary">Kembali</a>
</div>

</form>
@endsection
