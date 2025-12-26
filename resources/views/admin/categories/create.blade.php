@extends('layouts.admin')

@section('page-title','Tambah Kategori')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.categories.store') }}" method="POST">
@csrf

<div class="mb-3">
    <label>Nama Kategori</label>
    <input type="text" name="nama_kategori"
           class="form-control" value="{{ old('nama_kategori') }}">
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi"
        class="form-control">{{ old('deskripsi') }}</textarea>
</div>

<button class="btn btn-success">Simpan</button>
<a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
