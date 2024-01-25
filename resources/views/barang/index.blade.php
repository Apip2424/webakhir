@extends('layouts.app')

@section('title', 'Data Barang')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('barang.cari') }}" method="GET" class="mb-4">
            <form action="{{ url('download-barang-pdf') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Cari barang...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <a href="{{ route('cetakpdfbarang') }}" target="barang.barang-pdf">
            <button class="btn btn-success mb-4">Cetak PDF</button>
        </a>
        <a href="{{ route('barang.tambah') }}" class="btn btn-primary mb-4">Tambah Barang</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jenis Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($barang as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->nama_barang }}</td>
                        <td>{{ $row->jenis_barang }}</td>
                        <td>
                            <a href="{{ route('barang.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('barang.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@include('sweetalert::alert')
@endsection
