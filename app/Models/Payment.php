<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';
    protected $fillable = ['pay_bank', 'pay_norek', 'tgl_bayar'];
    public $timestamps =false;
    protected $primaryKey = 'order_id';
}
