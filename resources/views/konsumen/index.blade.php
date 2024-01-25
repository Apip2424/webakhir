@extends('layouts.app')

@section('title', 'Data Konsumen')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Konsumen</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('konsumen.cari') }}" method="GET" class="mb-4">
            <form action="{{ url('download-konsumen-pdf') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Cari konsumen...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <a href="{{ route('cetakpdfkonsumen') }}" target="konsumen.konsumen-pdf">
            <button class="btn btn-success mb-4">Cetak PDF</button>
        </a>
        <a href="{{ route('konsumen.tambah') }}" class="btn btn-primary mb-4">Tambah Konsumen</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Konsumen</th>
                        <th>Alamat</th>
                        <th>Nomor Telphone</th>
                        <th>Aksi</th>
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
                        <td>
                            <a href="{{ route('konsumen.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('konsumen.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
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
