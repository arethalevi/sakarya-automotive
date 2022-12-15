<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimWaktu extends Model
{
    use HasFactory;
    protected $table = 'dim_waktu';
    protected $primaryKey = 'sk_waktu';

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class,'sk_waktu','sk_waktu');
    }
}
