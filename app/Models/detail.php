<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'detail';

    protected $fillable = ['barang_id', 'warna', 'ukuran', 'jumlah', 'harga_per_item'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
        // return $this->hasMany(Pembayaran::class, 'nama_barang_id');
    }
}
