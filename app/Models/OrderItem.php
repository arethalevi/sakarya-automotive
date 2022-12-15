<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_item';
    protected $fillable =['order_id', 'catalog_id', 'jumlah_barang', 'harga'];
    protected $primaryKey = 'oi_id';
    public $timestamps =false;
}
