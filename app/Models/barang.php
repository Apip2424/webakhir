<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = ['nama_barang', 'jenis_barang'];

    public function detail()
    {
        return $this->hasOne(Detail::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'nama_barang_id');
    }
}
