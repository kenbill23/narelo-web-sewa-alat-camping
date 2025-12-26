@extends('layouts.admin')

@section('page-title','Data Transaksi')

@section('content')

{{-- NOTIFIKASI BERHASIL --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama User</th>
        <th>Tanggal Sewa</th>
        <th>Total</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($transactions as $i => $t)
    <tr>
        <td>{{ $i+1 }}</td>
        <td>{{ $t->user->name }}</td>
        <td>{{ $t->tanggal_sewa }}</td>
        <td>Rp {{ number_format($t->total_harga) }}</td>
        <td>
            @php
                $color = match($t->status) {
                    'pending' => 'warning',
                    'disewa'  => 'primary',
                    'selesai' => 'success',
                    'batal'   => 'danger',
                    default   => 'secondary'
                };
            @endphp
            <span class="badge bg-{{ $color }}">{{ $t->status }}</span>
        </td>
        <td>
            <a href="{{ route('admin.transactions.show',$t->id) }}"
               class="btn btn-sm btn-primary">
               Detail
            </a>
        </td>
    </tr>
    @endforeach
</table>

<div class="d-flex justify-content-center mt-4">
    {{ $transactions->links() }}
</div>


@endsection
