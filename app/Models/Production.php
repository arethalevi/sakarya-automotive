<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalog;

class Production extends Model
{
    use HasFactory;
    protected $table = 'production';
    protected $fillable = ['production_id', 'catalog_id', 'tgl_produksi', 'jumlah_barang'];
    public $timestamps =false;
    protected $primaryKey = 'production_id';

    
}
