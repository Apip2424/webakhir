@extends('layouts.app')

@section('title', isset($pembayaran) ? 'Form Edit Pembayaran' : 'Form Tambah Pembayaran')

@section('contents')
<form action="{{ isset($pembayaran) ? route('pembayaran.tambah.update', $pembayaran->id) : route('pembayaran.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($pembayaran) ? 'Form Edit Pembayaran' : 'Form Tambah Pembayaran' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_barang_id">Nama Barang</label>
                        <select id="nama_barang_id" name="nama_barang_id" class="form-control">
                            @foreach ($barang as $barangItem)
                            <option value="{{ $barangItem->id }}" {{ isset($pembayaran) && $pembayaran->nama_barang_id == $barangItem->id ? 'selected' : '' }}>
                                {{ $barangItem->nama_barang }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="konsumen_id">Nama Konsumen</label>
                        <select id="konsumen_id" name="konsumen_id" class="form-control">
                            @foreach ($konsumen as $konsumenItem)
                            <option value="{{ $konsumenItem->id }}" {{ isset($pembayaran) && $pembayaran->konsumen_id == $konsumenItem->id ? 'selected' : '' }}>
                                {{ $konsumenItem->nama_konsumen }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
    <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
    <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" value="{{ isset($pembayaran) ? \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('Y-m-d') : '' }}">
</div>


                    <div class="form-group">
                        <label for="jumlah_pesanan">Jumlah Pesanan</label>
                        <input type="text" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" value="{{ isset($pembayaran) ? $pembayaran->jumlah_pesanan : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="jenis_pembayaran">Jenis Pembayaran</label>
                        <input type="text" class="form-control" id="jenis_pembayaran" name="jenis_pembayaran" value="{{ isset($pembayaran) ? $pembayaran->jenis_pembayaran : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="number" class="form-control" id="total" name="total" value="{{ isset($pembayaran) ? $pembayaran->total : '' }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

@push('js')
<script>
    const barang = @json($barang);
    let harga;

    $(document).ready(()=>{
        for (let i = 0; i < barang.length; i++) {
           if (barang[i].id == $('#nama_barang_id').val()) {
                harga = barang[i].detail.harga_per_item
                break;
           }   
        }
    })

    $('#nama_barang_id').on('change',()=>{
        for (let i = 0; i < barang.length; i++) {
           if (barang[i].id == $('#nama_barang_id').val()) {
                harga = barang[i].detail.harga_per_item
                break;
           }   
        }
        $('#total').val(harga * $('#jumlah_pesanan').val() + '.000')

    })

    $('#jumlah_pesanan').on('blur',e=>{
        $('#total').val(harga * e.target.value + '.000')
    })
    console.log(barang);
</script>
@endpush
@endsection
