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

    //search
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->orWhereHas('barang', function ($subQuery) use ($search) {
                $subQuery->where('nama_barang', 'like', '%' . $search . '%');
            })
            ->orWhere('warna', 'like', '%' . $search . '%')
            ->orWhere('ukuran', 'like', '%' . $search . '%')
            ->orWhere('harga_per_item', 'like', '%' . $search . '%')
            ->orWhere('jumlah', 'like', '%' . $search . '%');
        });
    }
}