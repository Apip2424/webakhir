<?php
namespace App\Http\Controllers;

use App\Models\Konsumen;
use Illuminate\Http\Request;
use PDF;

class KonsumenController extends Controller
{
    public function index()
    {
        $konsumen = Konsumen::with('pembayaran')->get();

        return view('konsumen.index', compact('konsumen'));
    }

    public function cetakpdf()
    {
       
        $konsumen = Konsumen::limit(20)->get();


        $pdf = \PDF::loadView('konsumen.konsumen-pdf', compact('konsumen'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('konsumen.pdf');
    }

    public function tambah()
    {
        return view('konsumen.form');
    }

    public function simpan(Request $request)
    {
        Konsumen::create([
            'nama_konsumen' => $request->nama_konsumen,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('konsumen.index')->with('success', 'Data Konsumen Berhasil Di Simpan');
    }


    public function cari(Request $request)
{
    $searchTerm = $request->input('search');

    $konsumen = Konsumen::where('nama_konsumen', 'LIKE', "%$searchTerm%")
                        ->orWhere('alamat', 'LIKE', "%$searchTerm%")
                        ->orWhere('no_telp', 'LIKE', "%$searchTerm%")
                        ->get();

    return view('konsumen.index', compact('konsumen'));
}


    public function edit($id)
    {
        $konsumen = Konsumen::find($id);

        return view('konsumen.form', compact('konsumen'));
    }

    public function update($id, Request $request)
    {
        $konsumen = Konsumen::find($id);
        $konsumen->update([
            'nama_konsumen' => $request->nama_konsumen,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('konsumen.index')->with('success', 'Data Konsumen Telah Di Update');
    }

    public function hapus($id)
    {
        Konsumen::find($id)->delete();

        return redirect()->route('konsumen.index')->with('success', 'Data Konsumen Telah Di Hapus');
    }
}
