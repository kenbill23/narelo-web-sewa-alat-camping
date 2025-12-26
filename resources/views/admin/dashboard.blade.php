@extends('layouts.admin')

@section('title','Dashboard Admin')
@section('page-title','Dashboard Admin')

@section('content')

<div class="row g-4 mb-4">

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <i class="bi bi-people fs-2 text-primary"></i>
                <h6 class="mt-2">Total User</h6>
                <h4>{{ $totalUser }}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <i class="bi bi-box fs-2 text-success"></i>
                <h6 class="mt-2">Total Alat</h6>
                <h4>{{ $totalItem }}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <i class="bi bi-receipt fs-2 text-warning"></i>
                <h6 class="mt-2">Total Transaksi</h6>
                <h4>{{ $totalTransaksi }}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <i class="bi bi-cash fs-2 text-danger"></i>
                <h6 class="mt-2">Pendapatan</h6>
                <h5>Rp {{ number_format($totalPendapatan) }}</h5>
            </div>
        </div>
    </div>

</div>

<!-- TRANSAKSI TERBARU -->
<div class="card shadow-sm border-0">
    <div class="card-header bg-dark">
        <strong>Transaksi Terbaru</strong>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>User</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestTransactions as $t)
                <tr>
                    <td>{{ $t->user->name }}</td>
                    <td>{{ $t->created_at->format('d-m-Y') }}</td>
                    <td>
                        <span class="badge bg-info">
                            {{ $t->status }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">
                        Belum ada transaksi
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
