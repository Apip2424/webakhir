<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    //search

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->orWhereHas('barang', function ($subQuery) use ($search) {
                $subQuery->where('nama_barang', 'like', '%' . $search . '%');
            })
            ->orWhereHas('konsumen', function ($subQuery) use ($search) {
                $subQuery->where('nama_konsumen', 'like', '%' . $search . '%');
            })
            ->orWhere('jumlah_pesanan', 'like', '%' . $search . '%')
            ->orWhere('jenis_pembayaran', 'like', '%' . $search . '%')
            ->orWhere('total', 'like', '%' . $search . '%');
        });
    }
    
    public function scopeTgl($query, array $filters)
{
    $query->when($filters['tgl_awal'] ?? false, function($query, $tgl_awal) use ($filters){
        $query->whereDate('tanggal_pembayaran', '>=', $tgl_awal);

        // If end date is provided, add a condition for it
        if (isset($filters['tgl_akhir']) && $filters['tgl_akhir']) {
            $query->whereDate('tanggal_pembayaran', '<=', $filters['tgl_akhir']);
        }

        return $query;
    });
}

    



    
    

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