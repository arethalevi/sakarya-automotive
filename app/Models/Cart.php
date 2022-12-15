<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = ['user_id', 'catalog_id', 'jumlah_barang'];
    protected $primaryKey = 'cart_id';

    public function catalog()
    {
        return $this->belongsTo(Catalog::class,'catalog_id','catalog_id');
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class,'catalog_id','catalog_id');
    }
}
