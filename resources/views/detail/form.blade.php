@extends('layouts.app')

@section('title', isset($detail) ? 'Form Edit Detail' : 'Form Tambah Detail')

@section('contents')
<form action="{{ isset($detail) ? route('detail.tambah.update', $detail->id) : route('detail.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($detail) ? 'Form Edit Detail' : 'Form Tambah Detail' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="barang_id">Id Barang</label>
                        <input type="number" class="form-control" id="barang_id" name="barang_id" value="{{ isset($detail) ? $detail->barang_id : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="warna">Warna Barang</label>
                        <input type="text" class="form-control" id="warna" name="warna" value="{{ isset($detail) ? $detail->warna : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="ukuran">Ukuran Barang</label>
                        <input type="text" class="form-control" id="ukuran" name="ukuran" value="{{ isset($detail) ? $detail->ukuran : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Barang</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ isset($detail) ? $detail->jumlah : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="harga_per_item">Harga Per Item</label>
                        <input type="number" class="form-control" id="harga_per_item" name="harga_per_item" value="{{ isset($detail) ? $detail->harga_per_item : '' }}">
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
