<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Production;

class Catalog extends Model
{
    use HasFactory;
    protected $table = 'catalog';
    protected $fillable = ['cat_id','nama_barang', 'tipe', 'deskripsi', 'harga', 'image', 'slug'];
    public $timestamps =false;
    protected $primaryKey = 'catalog_id';



}
