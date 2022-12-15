<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DimWaktu;
use App\Models\Penjualan;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function Linechart()
    {
        $penjualan = Penjualan::join('dim_waktu', 'penjualan.sk_waktu', '=', 'dim_waktu.sk_waktu ')
        ->get(['penjualan.harga_total', 'dim_waktu.tahun'])->toArray();
        return view('Linechart', compact('penjualan'));
    }
}
