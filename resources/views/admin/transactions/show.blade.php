@extends('layouts.admin')

@section('page-title','Detail Transaksi')

@section('content')

<h6 style="color:#ffffff !important;
           font-weight:700;
           text-shadow:0 2px 4px rgba(0,0,0,0.7);">
    Nama Penyewa: {{ $transaction->user->name }}
</h6>
<p>Total Bayar: <strong>Rp {{ number_format($transaction->total_harga) }}</strong></p>

<table class="table table-bordered mb-4">
    <tr>
        <th>Alat</th>
        <th>Qty</th>
        <th>Harga / Hari</th>
        <th>Subtotal</th>
    </tr>

    @foreach($transaction->items as $item)
    <tr>
        <td>{{ $item->item->nama_item }}</td>
        <td>{{ $item->qty }}</td>
        <td>Rp {{ number_format($item->harga) }}</td>
        <td>Rp {{ number_format($item->subtotal) }}</td>
    </tr>
    @endforeach
</table>

<form action="{{ route('admin.transactions.update',$transaction->id) }}"
      method="POST" class="w-25">
@csrf
@method('PUT')

<select name="status" class="form-control mb-3">
    <option value="pending" {{ $transaction->status=='pending'?'selected':'' }}>Pending</option>
    <option value="disewa" {{ $transaction->status=='disewa'?'selected':'' }}>Disewa</option>
    <option value="selesai" {{ $transaction->status=='selesai'?'selected':'' }}>Selesai</option>
    <option value="batal" {{ $transaction->status=='batal'?'selected':'' }}>Batal</option>
</select>

<button class="btn btn-success">Update Status</button>
</form>

@endsection
