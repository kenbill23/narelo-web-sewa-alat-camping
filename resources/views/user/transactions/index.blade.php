@extends('layouts.user')

@section('content')
<div class="container my-4">

    <h4 class="mb-4 fw-bold">Riwayat Penyewaan</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="50">No</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Kembali</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($transactions as $i => $t)
                        <tr>
                            <td>{{ $i+1 }}</td>

                            <td>
                                {{ \Carbon\Carbon::parse($t->tanggal_sewa)
                                    ->translatedFormat('d M Y') }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($t->tanggal_kembali)
                                    ->translatedFormat('d M Y') }}
                            </td>

                            <td class="fw-semibold text-success">
                                Rp {{ number_format($t->total_harga,0,',','.') }}
                            </td>

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

                                <span class="badge bg-{{ $color }} text-uppercase">
                                    {{ $t->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Belum ada riwayat penyewaan
                            </td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
@endsection
