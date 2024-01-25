<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function(){
    Route::get('register','register')->name('register');
    Route::post('register','registerSimpan')->name('register.simpan');

    Route::get('login',[AuthController::class,'login'])->name('login');
    Route::post('login',[AuthController::class,'loginAksi'])->name('login.aksi');

    Route::get('logout', 'login')->middleware('auth')->name('logout');
});

Route::get('/', function (){
    return view('welcome');
});

Route::middleware('auth')->group(function(){
Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Route::controller(BarangController::class)->prefix('barang')->group(function () {
//     Route::get('', 'index')->name('barang.index');
//     Route::get('tambah', 'tambah')->name('barang.tambah');
//     Route::post('tambah', 'simpan')->name('barang.tambah.simpan');
//     Route::get('edit/{id}', 'edit')->name('barang.edit');
//     Route::post('edit/{id}', 'update')->name('barang.tambah.update');
//     Route::get('hapus/{id}', 'hapus')->name('barang.hapus');
// });

Route::controller(BarangController::class)->prefix('barang')->group(function () {
    Route::get('', 'index')->name('barang.index');
    Route::get('tambah', 'tambah')->name('barang.tambah');
    Route::post('tambah', 'simpan')->name('barang.simpan');
    Route::get('edit/{id}', 'edit')->name('barang.edit');
    Route::put('edit/{id}', 'update')->name('barang.update');
    Route::get('hapus/{id}', 'hapus')->name('barang.hapus');
    Route::get('/download-barang-pdf', [BarangController::class, 'cetakpdf'])->name('cetakpdfbarang');
});



Route::controller(DetailController::class)->prefix('detail')->group(function () {
    Route::get('', 'index')->name('detail.index');
    Route::get('tambah', 'tambah')->name('detail.tambah');
    Route::post('tambah', 'simpan')->name('detail.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('detail.edit');
    Route::post('edit/{id}', 'update')->name('detail.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('detail.hapus');
    Route::get('/download-detail-pdf', [DetailController::class, 'cetakpdf'])->name('cetakpdfdetail');
});

Route::controller(KonsumenController::class)->prefix('konsumen')->group(function () {
    Route::get('', 'index')->name('konsumen.index');
    Route::get('tambah', 'tambah')->name('konsumen.tambah');
    Route::post('tambah', 'simpan')->name('konsumen.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('konsumen.edit');
    Route::put('edit/{id}', 'update')->name('konsumen.update');
    Route::get('hapus/{id}', 'hapus')->name('konsumen.hapus');
    Route::get('/download-detail-pdf', [KonsumenController::class, 'cetakpdf'])->name('cetakpdfkonsumen');
});

Route::controller(PembayaranController::class)->prefix('pembayaran')->group(function () {
    Route::get('', 'index')->name('pembayaran.index');
    Route::get('tambah', 'tambah')->name('pembayaran.tambah');
    Route::post('tambah', 'simpan')->name('pembayaran.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('pembayaran.edit');
    Route::post('edit/{id}', 'update')->name('pembayaran.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('pembayaran.hapus');
    Route::get('hapus-konfirmasi/{id}', 'konfirmasiHapus')->name('pembayaran.hapus.konfirmasi');
    Route::get('/download-pembayaran-pdf', [PembayaranController::class, 'cetakpdf'])->name('cetakpdf');
    });
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/barang/cari', [BarangController::class, 'cari'])->name('barang.cari');
Route::get('/detail/cari', [DetailController::class, 'cari'])->name('detail.cari');
Route::get('/konsumen/cari', [KonsumenController::class, 'cari'])->name('konsumen.cari');
Route::get('/pembayaran/cari', [PembayaranController::class, 'cari'])->name('pembayaran.cari');



// Route::get('pembayaran/view/pdf', [PembayaranController::class, 'view_pdf']);
