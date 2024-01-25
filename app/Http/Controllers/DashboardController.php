<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Detail;
use App\Models\Konsumen;
use App\Models\Pembayaran;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $barangCount = Barang::count();
        $pembayaranCount = Pembayaran::count();
        $konsumenCount = Konsumen::count();

        // Hitung total harga dari model Detail
        $totalHargaDetail = Detail::sum('harga_per_item');
        $totalPembayaranPembayaran = Pembayaran::sum('total');

        $totalUntung = $totalPembayaranPembayaran - $totalHargaDetail ;

        return view('dashboard', compact('barangCount', 'pembayaranCount', 'konsumenCount', 'totalHargaDetail', 'totalPembayaranPembayaran', 'totalUntung'));
    }
}


 