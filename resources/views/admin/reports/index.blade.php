@extends('layouts.admin')

@section('page-title','Laporan Penyewaan')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="bi bi-file-earmark-text"></i> Laporan Penyewaan
        </h5>

        {{-- TOMBOL CETAK --}}
        <button onclick="window.print()" class="btn btn-light btn-sm">
            <i class="bi bi-printer"></i> Cetak
        </button>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">
            <thead class="table-success text-center">
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Tanggal Sewa</th>
                    <th>Status</th>
                    <th>Total Bayar</th>
                </tr>
            </thead>

            <tbody>
                @forelse($reports as $i => $r)
                <tr>
                    <td class="text-center">{{ $i + 1 }}</td>

                    <td>{{ $r->user->name ?? '-' }}</td>

                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($r->start_date)->format('d-m-Y') }}
                        s/d
                        {{ \Carbon\Carbon::parse($r->end_date)->format('d-m-Y') }}
                    </td>

                    {{-- STATUS --}}
                    <td class="text-center">
                        @if($r->status == 'selesai')
                            <span class="badge bg-success">Selesai</span>
                        @elseif($r->status == 'disewa')
                            <span class="badge bg-primary">Disewa</span>
                        @elseif($r->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($r->status == 'batal')
                            <span class="badge bg-danger">Batal</span>
                        @else
                            <span class="badge bg-secondary">{{ $r->status }}</span>
                        @endif
                    </td>

                    <td class="text-end">
                        Rp {{ number_format($r->total_harga, 0, ',', '.') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Tidak ada data laporan
                    </td>
                </tr>
                @endforelse
            </tbody>

            {{-- TOTAL PENDAPATAN --}}
            <tfoot class="table-success fw-bold">
                <tr>
                    <td colspan="4" class="text-end">Total Pendapatan</td>
                    <td class="text-end">
                        Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>
</div>

{{-- STYLE KHUSUS CETAK --}}
<style>
@media print {
    button,
    .navbar,
    .sidebar,
    .card-header button {
        display: none !important;
    }

    body {
        background: white !important;
    }

    table {
        font-size: 12px;
    }
}
</style>

@endsection
