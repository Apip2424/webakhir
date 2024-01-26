<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Detail;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use PDF;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        // $barang = Barang::get();
        // return view('barang.index', compact('barang'));
        $filtr = Barang::latest()->filter(request(['search']));
        $barang = $filtr->paginate(7);
        
        return view('barang.index', compact('barang'));
    }

    // public function cetakpdf()
    // {
    //     $barang = Barang::limit(20)->get();
    //     $pdf = \PDF::loadView('barang.barang-pdf', compact('barang'));
    //     $pdf->setPaper('A4', 'landscape');
    //     return $pdf->stream('barang.pdf');
    // }

    // public function cetakpdf(Request $request)
    // {
    //     $filtr = Barang::latest()->filter($request->all());
    //     $barang = $filtr->limit(20)->get();
    
    //     $pdf = \PDF::loadView('barang.barang-pdf', compact('barang'));
    //     $pdf->setPaper('A4', 'landscape');
    
    //     return $pdf->stream('barang.pdf');
    // }

    public function cetakpdf(Request $request)
{
    $barang = Barang::latest()
        ->filter(['search' => $request->search])
        ->paginate(20);

    $pdf = \PDF::loadView('barang.barang-pdf', compact('barang'));
    $pdf->setPaper('A4', 'landscape');

    return $pdf->stream('barang.pdf');
}
    


    public function tambah()
    {
        return view('barang.form');
    }

    public function simpan(Request $request)
    {
        $barang = Barang::create([
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
        ]);

        Detail::create([
            'barang_id' => $barang->id,
            'warna' => $request->warna,
            'ukuran' => $request->ukuran,
            'jumlah' => $request->jumlah,
            'harga_per_item' => $request->harga_per_item,
        ]);

        return redirect()->route('detail.index')->with('success', 'Data Barang Berhasil Di Simpan, Silahkan Memasukkan Detail Barang');
    }

    public function edit($id)
    {
        $barang = Barang::find($id);

        return view('barang.form', compact('barang'));
    }

    public function update($id, Request $request)
    {
        $barang = Barang::find($id);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
        ]);

        return redirect()->route('barang.index')->with('success', 'Data Barang Telah Berhasil Di Update');
    }

//     public function cari(Request $request)
// {
//     $searchTerm = $request->input('search');

//     $barang = Barang::where('nama_barang', 'LIKE', "%$searchTerm%")
//                      ->orWhere('jenis_barang', 'LIKE', "%$searchTerm%")
//                      ->get();

//     return view('barang.index', compact('barang'));
// }



    public function hapus($id)
{
    $barang = Barang::find($id);

    if ($barang) {
        $barang->delete();
    }

    return redirect()->route('barang.index')->with('success', 'Data Barang Telah Berhasil Di Hapus');
}
}