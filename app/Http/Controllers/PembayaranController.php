<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Pembayaran;
use App\Models\Barang;
use App\Models\Konsumen;
use App\Models\Detail;
use Illuminate\Http\Request;
use PDF;


class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with(['barang', 'konsumen'])->get();
        return view('pembayaran.index', compact('pembayaran'));
    }


    public function cetakpdf(Request $request)
    {
        $totalPembayaran = Pembayaran::sum('total');
        $pembayaran = Pembayaran::limit(20)->get();



        $pdf = \PDF::loadView('pembayaran.pembayaran-pdf', compact('pembayaran','totalPembayaran'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('pembayaran.pdf');
    }

    public function cari(Request $request)
    {

        $searchTerm = $request->input('search');

        $pembayaran = Pembayaran::with(['barang', 'konsumen'])
            ->whereHas('barang', function ($query) use ($searchTerm) {
                $query->where('nama_barang', 'LIKE', "%$searchTerm%");
            })
            ->orWhereHas('konsumen', function ($query) use ($searchTerm) {
                $query->where('nama_konsumen', 'LIKE', "%$searchTerm%");
            })
            ->orWhere('tanggal_pembayaran', 'LIKE', "%$searchTerm%")
            ->orWhere('jumlah_pesanan', 'LIKE', "%$searchTerm%")
            ->orWhere('jenis_pembayaran', 'LIKE', "%$searchTerm%")
            ->orWhere('total', 'LIKE', "%$searchTerm%")
            ->get();

        return view('pembayaran.index', compact('pembayaran'));
    }




    public function tambah()
    {
        $barang = Barang::with('detail')->get();
        $konsumen = Konsumen::all();

        return view('pembayaran.form', compact('barang', 'konsumen'));
    }

    public function simpan(Request $request)
{
    $pembayaran = Pembayaran::create([
        'nama_barang_id' => $request->nama_barang_id,
        'konsumen_id' => $request->konsumen_id,
        'tanggal_pembayaran' => $request->tanggal_pembayaran,
        'jumlah_pesanan' => $request->jumlah_pesanan,
        'jenis_pembayaran' => $request->jenis_pembayaran,
        'total' => $request->total,
    ]);

    // Kurangi jumlah barang di detail
    $detail = Detail::where('barang_id', $request->nama_barang_id)->first();
    if ($detail) {
        $detail->jumlah -= $request->jumlah_pesanan;
        $detail->save();
    }

    return redirect()->route('pembayaran.index')->with('success', 'Data Pembayaran Berhasil Di Simpan');
}


    public function edit($id)
    {
        $pembayaran = Pembayaran::find($id);
        $barang = Barang::all();
        $konsumen = Konsumen::all();

        return view('pembayaran.form', compact('pembayaran', 'barang', 'konsumen'));
    }

    public function update($id, Request $request)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->update([
            'nama_barang_id' => $request->nama_barang_id,
            'konsumen_id' => $request->konsumen_id,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'total' => $request->total,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Data Pembayaran Telah Berhasil Di Update');
    }

    public function hapus($id)
{
    $pembayaran = Pembayaran::find($id);

    if ($pembayaran) {
        $pembayaran->delete();
    }

    return redirect()->route('pembayaran.index')->with('success', 'Data Pembayaran Telah Berhasil Di Hapus');
}

}
