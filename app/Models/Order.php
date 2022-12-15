<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'cust_order';
    protected $fillable = [
        'payment_status',
        'name',
        'email',
        'phone',
        'address',
        'user_id',
        'tgl_kirim',
        'shipping_status'
    ];
    protected $primaryKey = 'order_id';
}
