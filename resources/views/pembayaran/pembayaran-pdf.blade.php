<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

<style>
    /* Tambahkan gaya border untuk tabel */
.table-bordered {
    border: 1px solid #000000;
}

/* Tambahkan padding pada sel tabel */
.table td,
.table th {
    text-align: center;
    padding: 8px;
}

/* Tambahkan gaya pada footer kartu */
.card-footer {
    background: lightblue;
    padding: 10px;
}

</style>
<div class="table-responsive">
    <table border="1" class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Nama Konsumen</th>
                <th>Tanggal Pembayaran</th>
                <th>Jumlah Pesanan</th>
                <th>Jenis Pembayaran</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php($no = 1)
            @foreach ($pembayaran as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->barang->nama_barang ?? 'nama_barang' }}</td>
                <td>{{ $row->konsumen->nama_konsumen }}</td>
                <td>{{ $row->tanggal_pembayaran }}</td>
                <td>{{ $row->jumlah_pesanan }}</td>
                <td>{{ $row->jenis_pembayaran }}</td>
                <td>Rp.{{ $row->total }}</td>
            </tr>
            {{-- @if (is_numeric($row->total))
            @php($totalPembayaran += $row->total)
            @endif --}}
            @endforeach
        </tbody>
    </table>
</div>
<br>
<div class="card-footer">
    <strong>Total Pembayaran: Rp.{{ number_format($totalPembayaran, 0, ',', '.') }}.000</strong>
</div>
