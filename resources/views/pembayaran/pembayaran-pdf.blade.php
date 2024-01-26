<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

<style>
    /* Add styles for border and padding */
    table {
        border-collapse: collapse;
        width: 100%;
    }

    table,
    th,
    td {
        border: 1px solid #000;
    }

    th,
    td {
        text-align: center;
        padding: 8px;
    }

    /* Add styles for the card footer */
    .card-footer {
        background: lightblue;
        padding: 10px;
    }
</style>

<div class="table-responsive">
    <table>
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
                    <td>{{ $row->barang->nama_barang ?? 'Nama Barang' }}</td>
                    <td>{{ $row->konsumen->nama_konsumen ?? 'Nama Konsumen' }}</td>
                    <td>{{ $row->tanggal_pembayaran }}</td>
                    <td>{{ $row->jumlah_pesanan }}</td>
                    <td>{{ $row->jenis_pembayaran }}</td>
                    <td>Rp.{{ $row->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>
<div class="card-footer">
    <strong>Total Pembayaran: Rp.{{ number_format($totalPembayaran, 0, ',', '.') }}.000</strong>
</div>
