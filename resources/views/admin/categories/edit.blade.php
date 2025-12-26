@extends('layouts.admin')

@section('page-title','Edit Kategori')

@section('content')

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
@csrf
@method('PUT')

<div class="mb-3">
    <label>Nama Kategori</label>
    <input type="text" name="nama_kategori"
           value="{{ $category->nama_kategori }}"
           class="form-control">
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi"
        class="form-control">{{ $category->deskripsi }}</textarea>
</div>

<button class="btn btn-success">Update</button>
<a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
