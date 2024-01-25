@extends('layouts.app')

@section('title', 'Data Pembayaran')

@section('contents')
@php($totalPembayaran = 0)
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('pembayaran.cari') }}" method="GET" class="mb-4">
        <form action="{{ url('download-pembayaran-pdf') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Cari pembayaran...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
            <br>
        </form>
        <a href="{{ route('cetakpdf') }}" target="pembayaran.pembayaran-pdf">
            <button class="btn btn-success mb-4">Cetak PDF</button>
        </a>
        <a href="{{ route('pembayaran.tambah') }}" class="btn btn-primary mb-4">Tambah Pembayaran</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Nama Konsumen</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Jumlah Pesanan</th>
                        <th>Jenis Pembayaran</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($pembayaran as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->barang->nama_barang ?? 'nama_barang' }}</td>
                        <td>{{ $row->konsumen->nama_konsumen }}</td>
                        <td>{{ $row->tanggal_pembayaran }}</td>
                        <td>{{ $row->jumlah_pesanan }}</td>
                        <td>{{ $row->jenis_pembayaran }}</td>
                        <td>Rp.{{ $row->total }}</td>
                        <td>
                            <a href="{{ route('pembayaran.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('pembayaran.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @if (is_numeric($row->total))
                    @php($totalPembayaran += $row->total)
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card-footer">
    <strong>Total Pembayaran: Rp.{{ number_format($totalPembayaran, 0, ',', '.') }}.000</strong>
</div>

@include('sweetalert::alert')

@endsection
