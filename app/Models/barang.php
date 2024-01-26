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

    //search

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->orWhere('nama_barang', 'like', '%' . $search . '%')
                        ->orWhere('jenis_barang', 'like', '%' . $search . '%');  
        });
    }
}