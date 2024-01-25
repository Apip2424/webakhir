@extends('layouts.app')

@section('title', 'Data Detail')

@section('contents')
@php($totalHarga = 0)
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Detail Barang</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('detail.cari') }}" method="GET" class="mb-4">
        <form action="{{ url('download-detail-pdf') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Cari detail barang...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <a href="{{ route('cetakpdfdetail') }}" target="pembayaran.pembayaran-pdf">
            <button class="btn btn-success mb-4">Cetak PDF</button>
        </a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Warna</th>
                        <th>Ukuran</th>
                        <th>Jumlah</th>
                        <th>Harga Per-Item</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($detail as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->barang->nama_barang }}</td>
                        <td>{{ $row->warna }}</td>
                        <td>{{ $row->ukuran }}</td>
                        <td>{{ $row->jumlah }}</td>
                        <td>Rp. {{ $row->harga_per_item }}</td>
                        <td>
                            <a href="{{ route('detail.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                            <!-- <a href="{{ route('detail.hapus', $row->id) }}" class="btn btn-danger">Hapus</a> -->
                        </td>
                    </tr>
                    @php($totalHarga += $row->harga_per_item)
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card-footer">
    <strong>Total Harga: Rp. {{ number_format($totalHarga, 0, ',', '.') }}.000</strong>
</div>

@include('sweetalert::alert')

@endsection
