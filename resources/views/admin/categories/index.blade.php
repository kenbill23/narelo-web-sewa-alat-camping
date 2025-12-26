@extends('layouts.admin')

@section('page-title','Data Kategori')

@section('content')

{{-- FLASH MESSAGE --}}
@if(session('success'))
    <div class="alert alert-success shadow-sm d-flex align-items-center">
        <i class="bi bi-check-circle-fill me-2"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-semibold mb-0 text-white">
        <i class="bi bi-tags-fill me-2"></i> Daftar Kategori
    </h4>

    <a href="{{ route('admin.categories.create') }}"
       class="btn btn-success shadow-sm px-3">
        <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
    </a>
</div>

{{-- TABLE CARD --}}
<div class="card shadow-lg border-0"
     style="
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(10px);
        border-radius: 18px;
     ">

    <div class="table-responsive">
        <table class="table align-middle mb-0">

            <thead style="background:#1b4332; color:#ffffff;">
                <tr>
                    <th width="60" class="text-center">No</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th width="140" class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($categories as $i => $category)
                <tr>
                    <td class="text-center fw-semibold">
                        {{ $i + 1 }}
                    </td>

                    <td class="fw-semibold">
                        {{ $category->nama_kategori }}
                    </td>

                    <td class="text-muted">
                        {{ $category->deskripsi ?? '-' }}
                    </td>

                    <td class="text-center">
                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                           class="btn btn-warning btn-sm me-1"
                           title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus kategori?')"
                                title="Hapus">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted py-5">
                        <i class="bi bi-folder-x fs-3 d-block mb-2"></i>
                        Belum ada data kategori
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>

@endsection
