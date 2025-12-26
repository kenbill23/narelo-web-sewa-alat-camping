@extends('layouts.admin')

@section('page-title','Data Alat Hiking')

@section('content')

{{-- FLASH MESSAGE --}}
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- BARIS ATAS: TAMBAH ALAT + FILTER --}}
<div class="d-flex flex-wrap align-items-center gap-2 mb-3 px-4">

    {{-- TOMBOL TAMBAH --}}
    <a href="{{ route('admin.items.create') }}" class="btn btn-primary">
        + Tambah Alat
    </a>

    {{-- FILTER KATEGORI --}}
    <form method="GET" class="d-flex align-items-center gap-2">
        <select name="category_id" class="form-select" style="min-width:220px">
            <option value="">-- Semua Kategori --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                    {{ ($categoryId == $cat->id) ? 'selected' : '' }}>
                    {{ $cat->nama_kategori }}
                </option>
            @endforeach
        </select>

        <button class="btn btn-success">
            <i class="bi bi-search"></i> Cari
        </button>

        <a href="{{ route('admin.items.index') }}" class="btn btn-secondary">
            Reset
        </a>
    </form>
</div>

<div class="table-responsive">
<table class="table table-bordered table-striped align-middle small">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Alat</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Stok</th>
            <th>Harga / Hari</th>
            <th>Gambar</th>
            <th>Status</th>
            <th>Dibuat</th>
            <th>Diupdate</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    @forelse($items as $i => $item)
        <tr>
            {{-- NOMOR URUT PAGINATION --}}
            <td>{{ $items->firstItem() + $i }}</td>

            <td>{{ $item->nama_item }}</td>
            <td>{{ $item->category->nama_kategori ?? '-' }}</td>

            <td style="max-width:200px">
                {{ Str::limit($item->deskripsi, 80) }}
            </td>

            <td class="text-center">{{ $item->stok }}</td>

            <td>
                Rp {{ number_format($item->harga_per_hari, 0, ',', '.') }}
            </td>

            <td class="text-center">
                @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}"
                         width="70" class="img-thumbnail">
                @else
                    <span class="text-muted">-</span>
                @endif
            </td>

            <td class="text-center">
                @if($item->status === 'tersedia')
                    <span class="badge bg-success">Tersedia</span>
                @else
                    <span class="badge bg-secondary">
                        {{ ucfirst($item->status) }}
                    </span>
                @endif
            </td>

            <td>{{ $item->created_at->format('d-m-Y') }}</td>
            <td>{{ $item->updated_at->format('d-m-Y') }}</td>

            <td>
                <a href="{{ route('admin.items.edit',$item->id) }}"
                   class="btn btn-warning btn-sm mb-1">
                   Edit
                </a>

                <form action="{{ route('admin.items.destroy',$item->id) }}"
                      method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus data?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="11" class="text-center text-muted">
                Data alat belum tersedia
            </td>
        </tr>
    @endforelse
    </tbody>
</table>
</div>

{{-- PAGINATION --}}
<div class="d-flex justify-content-center mt-4">
    {{ $items->links() }}
</div>

@endsection
