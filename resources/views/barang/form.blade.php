@extends('layouts.app')

@section('title', isset($barang) ? 'Form Edit Barang' : 'Form Tambah Barang')

@section('contents')
<form action="{{ isset($barang) ? route('barang.update', $barang->id) : route('barang.simpan') }}" method="post">
    @csrf
    @if(isset($barang))
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($barang) ? 'Form Edit Barang' : 'Form Tambah Barang' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ isset($barang) ? $barang->nama_barang : old('nama_barang') }}">
                    </div>
                    {{-- <div class="form-group">
                        <label for="jenis_barang">Jenis Barang</label>
                        <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" value="{{ isset($barang) ? $barang->jenis_barang : old('jenis_barang') }}">
                    </div> --}}
                    <div class="form-group">
                        <label for="jenis_barang">Jenis Barang</label>
                        <select name="jenis_barang" class="form-control">
                            <option name="v1" id="v1">Paketan</option>
                            <option name="v2" id="v2">Per-item</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
