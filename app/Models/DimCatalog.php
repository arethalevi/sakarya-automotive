<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimCatalog extends Model
{
    use HasFactory;
    protected $table = 'dim_catalog';
    protected $primaryKey = 'catalog_id';

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class,'catalog_id','catalog_id');
    }
}
