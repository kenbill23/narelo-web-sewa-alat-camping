@extends('layouts.admin')

@section('page-title','Edit Alat Hiking')

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

<form action="{{ route('admin.items.update',$item->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="mb-3">
    <label class="form-label">Nama Alat</label>
    <input type="text" name="nama_item" class="form-control"
           value="{{ old('nama_item', $item->nama_item) }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Kategori</label>
    <select name="category_id" class="form-control" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($categories as $c)
            <option value="{{ $c->id }}"
                {{ old('category_id', $item->category_id) == $c->id ? 'selected' : '' }}>
                {{ $c->nama_kategori }}
            </option>
        @endforeach
    </select>
</div>

{{-- DESKRIPSI --}}
<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="4" required>
        {{ old('deskripsi', $item->deskripsi) }}
    </textarea>
</div>

<div class="mb-3">
    <label class="form-label">Stok</label>
    <input type="number" name="stok" class="form-control"
           value="{{ old('stok', $item->stok) }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Harga / Hari</label>
    <input type="number" name="harga_per_hari" class="form-control"
           value="{{ old('harga_per_hari', $item->harga_per_hari) }}" required>
</div>

{{-- GAMBAR --}}
<div class="mb-3">
    <label class="form-label">Gambar</label>
    <input type="file" name="image" class="form-control">
    @if($item->image)
        <img src="{{ asset('storage/'.$item->image) }}"
             class="img-thumbnail mt-2" width="150">
    @endif
</div>

{{-- STATUS --}}
<input type="hidden" name="status" value="{{ $item->status ?? 'tersedia' }}">

<div class="mt-4">
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('admin.items.index') }}" class="btn btn-secondary">Kembali</a>
</div>

</form>
@endsection
