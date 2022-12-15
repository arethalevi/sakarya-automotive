<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;
    protected $table = 'fact_produksi';

    public function catalog()
    {
        return $this->belongsTo(DimWaktu::class,'sk_waktu','sk_waktu');
    }

    public function waktu()
    {
        return $this->belongsTo(DimCatalog::class,'catalog_id','catalog_id');
    }
}
