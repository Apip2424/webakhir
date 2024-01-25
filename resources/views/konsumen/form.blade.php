@extends('layouts.app')

@section('title','Form Konsumen')

@section('contents')
<<form action="{{ isset($konsumen) ? route('konsumen.update', $konsumen->id) : route('konsumen.tambah.simpan') }}" method="post">
    @csrf
    @if(isset($konsumen))
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($konsumen) ? 'Form Edit Konsumen' : 'Form Tambah Konsumen' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_konsumen">Nama Konsumen</label>
                        <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" value="{{ isset($konsumen) ? $konsumen->nama_konsumen : old('nama_konsumen') }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ isset($konsumen) ? $konsumen->alamat : old('alamat') }}">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ isset($konsumen) ? $konsumen->no_telp : old('no_telp') }}">
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
