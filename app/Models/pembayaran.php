<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'nama_barang_id', 'konsumen_id', 'tanggal_pembayaran', 'jumlah_pesanan', 'jenis_pembayaran', 'total'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'nama_barang_id');
    }

    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class, 'konsumen_id');
    }

    public static function boot()
{
    parent::boot();

    self::created(function ($pembayaran) {
        $detail = Detail::find($pembayaran->nama_barang_id);

        if ($detail) { // Periksa apakah objek detail ditemukan
            $detail->jumlah -= $pembayaran->jumlah_pembayaran;
            $detail->save();
            }
        });
    }
}
