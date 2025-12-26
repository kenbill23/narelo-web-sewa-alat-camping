@extends('layouts.user')

@section('title','Kategori')

@section('content')

<h4 class="mb-4">
    Kategori: {{ $category->nama_kategori }}
</h4>

@if($category->items->count() == 0)
    <div class="alert alert-warning">
        Belum ada alat pada kategori ini.
    </div>
@else
    <div class="row">
        @foreach($category->items as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">

                @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}"
                         class="card-img-top"
                         height="200"
                         alt="{{ $item->nama_item }}">
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $item->nama_item }}</h5>

                    <p class="card-text text-muted">
                        {{ Str::limit($item->deskripsi, 80) }}
                    </p>

                    <p class="fw-bold mb-2">
                        Rp {{ number_format($item->harga_per_hari) }} / hari
                    </p>

                    <a href="{{ route('user.item.show', $item->id) }}"
                       class="btn btn-success btn-sm mt-auto">
                        Lihat Detail
                    </a>
                </div>

            </div>
        </div>
        @endforeach
    </div>
@endif

@endsection
