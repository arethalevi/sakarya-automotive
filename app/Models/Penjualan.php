<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = 'fact_penjualan';
    protected $fillable = ['sk_waktu', 'catalog_id', 'jumlah_barang', 'harga_satuan', 'harga_total', 'tgl_bayar'];

    public function waktu()
    {
        return $this->belongsTo(DimWaktu::class,'sk_waktu','sk_waktu');
    }

    public function catalog()
    {
        return $this->belongsTo(DimCatalog::class,'catalog_id','catalog_id');
    }
}
