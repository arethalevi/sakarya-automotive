<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualitycontrol extends Model
{
    use HasFactory;
    protected $table = 'quality_control';
    protected $fillable = ['qc_status'];
    public $timestamps =false;
    protected $primaryKey = 'production_id';
}
