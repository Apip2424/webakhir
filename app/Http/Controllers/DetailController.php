<?php
namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;
use PDF;

class DetailController extends Controller
{
    public function index()
    {
        // $detail = Detail::with('barang')->get();
        // return view('detail.index', compact('detail'));
        $filtr = Detail::latest()->filter(request(['search']));
        $detail = $filtr->paginate(7);
        
        return view('detail.index', compact('detail'));
    }

    // public function cetakpdf()
    // {
    //     $totalDetail = Detail::sum('harga_per_item');
    //     $detail = Detail::limit(20)->get();


    //     $pdf = \PDF::loadView('detail.detail-pdf', compact('detail','totalDetail'));
    //     $pdf->setPaper('A4', 'landscape');

    //     return $pdf->stream('detail.pdf');
    // }

    public function cetakpdf(Request $request)
{
    $search = $request->input('search');
    $details = Detail::filter(['search' => $search])->get();
    $totalDetail = $details->sum('harga_per_item');

    $pdf = \PDF::loadView('detail.detail-pdf', compact('details', 'totalDetail'));
    $pdf->setPaper('A4', 'landscape');

    return $pdf->stream('detail.pdf');
}



    
    public function tambah()
    {
        return view('detail.form');
    }

    

//     public function cari(Request $request)
// {
//     $searchTerm = $request->input('search');

//     $detail = Detail::where('warna', 'LIKE', "%$searchTerm%")
//                      ->orWhere('ukuran', 'LIKE', "%$searchTerm%")
//                      ->orWhere('jumlah', 'LIKE', "%$searchTerm%")
//                      ->orWhere('harga_per_item', 'LIKE', "%$searchTerm%")
//                      ->get();

//     return view('detail.index', compact('detail'));
// }




    public function simpan(Request $request)
    {
        Detail::create([
            'barang_id' => $request->barang_id,
            'warna' => $request->warna,
            'ukuran' => $request->ukuran,
            'jumlah' => $request->jumlah,
            'harga_per_item' => $request->harga_per_item,
        ]);

        return redirect()->route('detail.index');
    }

    public function edit($id)
    {
        $detail = Detail::find($id);

        return view('detail.form', compact('detail'));
    }

    public function update($id, Request $request)
    {
        $detail = Detail::find($id);
        $detail->update([
            'barang_id' => $request->barang_id,
            'warna' => $request->warna,
            'ukuran' => $request->ukuran,
            'jumlah' => $request->jumlah,
            'harga_per_item' => $request->harga_per_item,
        ]);

        return redirect()->route('detail.index')->with('success', 'Data Detail Barang Telah Berhasil Di Update');
    }

    public function hapus($id)
    {
        Detail::find($id)->delete();

        return redirect()->route('detail.index');
    }
}