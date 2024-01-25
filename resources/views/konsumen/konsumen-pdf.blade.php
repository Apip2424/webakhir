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
                <th>Nama Konsumen</th>
                <th>Alamat</th>
                <th>Nomor Telphone</th>
            </tr>
        </thead>
        <tbody>
            @php($no = 1)
            @foreach ($konsumen as $row)
            <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->nama_konsumen }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->no_telp }}</td>
            </tr>
            {{-- @if (is_numeric($row->total))
            @php($totalPembayaran += $row->total)
            @endif --}}
            @endforeach
        </tbody>
    </table>
</div>
