<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DimWaktu;
use App\Models\Penjualan;
use App\Models\Produksi;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function Chart()
    {
        // Penjualan
        $total_harga_2021 = Penjualan::select(DB::raw("CAST(SUM(harga_total) as float) as total_harga"))
        ->where(DB::raw("Year(tgl_bayar)"), 2021)
        ->GroupBy(DB::raw("Month(tgl_bayar)"))
        ->OrderBy(DB::raw("Month(tgl_bayar)"))
        ->pluck('total_harga');

        $total_harga_2022 = Penjualan::select(DB::raw("CAST(SUM(harga_total) as float) as total_harga"))
        ->where(DB::raw("Year(tgl_bayar)"), 2022)
        ->GroupBy(DB::raw("Month(tgl_bayar)"))
        ->OrderBy(DB::raw("Month(tgl_bayar)"))
        ->pluck('total_harga');

        $jumlah_barang_2021 = Penjualan::select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->where(DB::raw("Year(tgl_bayar)"), 2021)
        ->GroupBy(DB::raw("Month(tgl_bayar)"))
        ->OrderBy(DB::raw("Month(tgl_bayar)"))
        ->pluck('jumlah_barang');

        $jumlah_barang_2022 = Penjualan::select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->where(DB::raw("Year(tgl_bayar)"), 2022)
        ->GroupBy(DB::raw("Month(tgl_bayar)"))
        ->OrderBy(DB::raw("Month(tgl_bayar)"))
        ->pluck('jumlah_barang');

        $bulan = Penjualan::select(DB::raw("MONTHNAME(tgl_bayar) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(tgl_bayar)"))
        ->OrderBy(DB::raw("Month(tgl_bayar)"))
        ->pluck('bulan');

        $tahun = Penjualan::select(DB::raw("Year(tgl_bayar) as tahun"))
        ->GroupBy(DB::raw("Year(tgl_bayar)"))
        ->OrderBy(DB::raw("Month(tgl_bayar)"))
        ->pluck('tahun');

        // Produksi
        $jumlah_produksi_2021 = Produksi::select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->where(DB::raw("Year(tgl_produksi)"), 2021)
        ->GroupBy(DB::raw("Month(tgl_produksi)"))
        ->OrderBy(DB::raw("Month(tgl_produksi)"))
        ->pluck('jumlah_barang');

        $jumlah_produksi_2022 = Produksi::select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->where(DB::raw("Year(tgl_produksi)"), 2022)
        ->GroupBy(DB::raw("Month(tgl_produksi)"))
        ->OrderBy(DB::raw("Month(tgl_produksi)"))
        ->pluck('jumlah_barang');

        $qc_pass_2022 = Produksi::select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->where(DB::raw("Year(tgl_produksi)"), 2022)->where('qc_status','QC Passed')->pluck('jumlah_barang');
        $qc_no_pass_2022 = Produksi::select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->where(DB::raw("Year(tgl_produksi)"), 2022)->where('qc_status','QC No Pass')->pluck('jumlah_barang');

        $qc_pass_2021 = Produksi::select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->where(DB::raw("Year(tgl_produksi)"), 2021)->where('qc_status','QC Passed')->pluck('jumlah_barang');
        $qc_no_pass_2021 = Produksi::select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->where(DB::raw("Year(tgl_produksi)"), 2021)->where('qc_status','QC No Pass')->pluck('jumlah_barang');

        // Top 5 Barang Terjual
        $top5_barang_2021 = DB::table('fact_penjualan')
        ->join('dim_catalog','fact_penjualan.catalog_id','=','dim_catalog.catalog_id')
        ->where(DB::raw("Year(fact_penjualan.tgl_bayar)"), 2021)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->OrderBy('jumlah_barang', 'DESC')
        ->limit(5)->pluck('jumlah_barang');

        $top5_barang_2022 = DB::table('fact_penjualan')
        ->join('dim_catalog','fact_penjualan.catalog_id','=','dim_catalog.catalog_id')
        ->where(DB::raw("Year(fact_penjualan.tgl_bayar)"), 2022)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->OrderBy('jumlah_barang', 'DESC')
        ->limit(5)->pluck('jumlah_barang');
        // dd($top5_barang_2022);

        $barang_2022 = DB::table('fact_penjualan')
        ->join('dim_catalog','fact_penjualan.catalog_id','=','dim_catalog.catalog_id')
        ->where(DB::raw("Year(fact_penjualan.tgl_bayar)"), 2022)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->select(DB::raw('nama_catalog'))
        ->groupBy('nama_catalog')
        ->OrderBy('jumlah_barang', 'DESC')
        ->limit(5)->pluck('nama_catalog');

        $barang_2021 = DB::table('fact_penjualan')
        ->join('dim_catalog','fact_penjualan.catalog_id','=','dim_catalog.catalog_id')
        ->where(DB::raw("Year(fact_penjualan.tgl_bayar)"), 2021)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->select(DB::raw('nama_catalog'))
        ->groupBy('nama_catalog')
        ->OrderBy('jumlah_barang', 'DESC')
        ->limit(5)->pluck('nama_catalog');

        // Top 5 Barang Produksi
        $top5_produksi_2021 = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->where(DB::raw("Year(fact_produksi.tgl_produksi)"), 2021)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->OrderBy('jumlah_barang', 'DESC')
        ->limit(5)->pluck('jumlah_barang');

        $top5_produksi_2022 = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->where(DB::raw("Year(fact_produksi.tgl_produksi)"), 2022)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->OrderBy('jumlah_barang', 'DESC')
        ->limit(5)->pluck('jumlah_barang');

        $produksi_2022 = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->where(DB::raw("Year(fact_produksi.tgl_produksi)"), 2022)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->select(DB::raw('nama_catalog'))
        ->groupBy('nama_catalog')
        ->OrderBy('jumlah_barang', 'DESC')
        ->limit(5)->pluck('nama_catalog');

        $produksi_2021 = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->where(DB::raw("Year(fact_produksi.tgl_produksi)"), 2021)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->select(DB::raw('nama_catalog'))
        ->groupBy('nama_catalog')
        ->OrderBy('jumlah_barang', 'DESC')
        ->limit(5)->pluck('nama_catalog');

        // Top Category
        $category_terjual_2022 = DB::table('fact_penjualan')
        ->join('dim_catalog','fact_penjualan.catalog_id','=','dim_catalog.catalog_id')
        ->where(DB::raw("Year(fact_penjualan.tgl_bayar)"), 2022)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_category')
        ->pluck('jumlah_barang');

        $category_terjual_2021 = DB::table('fact_penjualan')
        ->join('dim_catalog','fact_penjualan.catalog_id','=','dim_catalog.catalog_id')
        ->where(DB::raw("Year(fact_penjualan.tgl_bayar)"), 2021)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_category')
        ->pluck('jumlah_barang');

        $category_produksi_2022 = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->where(DB::raw("Year(fact_produksi.tgl_produksi)"), 2022)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_category')
        ->pluck('jumlah_barang');

        $category_produksi_2021 = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->where(DB::raw("Year(fact_produksi.tgl_produksi)"), 2021)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_category')
        ->pluck('jumlah_barang');

        $category = DB::table('fact_penjualan')
        ->join('dim_catalog','fact_penjualan.catalog_id','=','dim_catalog.catalog_id')
        ->select(DB::raw('nama_category'))
        ->groupBy('nama_category')
        ->pluck('nama_category');

        // Drilldown Production
        // Door
        $door_production_2021 = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Door')
        ->where(DB::raw("Year(fact_produksi.tgl_produksi)"), 2021)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        $door_production_2022 = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Door')
        ->where(DB::raw("Year(fact_produksi.tgl_produksi)"), 2022)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        $door_production_sales = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->select('nama_catalog')
        ->where('nama_category', 'Door')
        ->groupBy('nama_catalog')
        ->pluck('nama_catalog');

        // Lamp
        $lamp_production_2021 = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Lamp')
        ->where(DB::raw("Year(fact_produksi.tgl_produksi)"), 2021)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        $lamp_production_2022 = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Lamp')
        ->where(DB::raw("Year(fact_produksi.tgl_produksi)"), 2022)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        $lamp_production_sales = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->select('nama_catalog')
        ->where('nama_category', 'Lamp')
        ->groupBy('nama_catalog')
        ->pluck('nama_catalog');

        // Window
        $window_production_2021 = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Window')
        ->where(DB::raw("Year(fact_produksi.tgl_produksi)"), 2021)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        $window_production_2022 = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Window')
        ->where(DB::raw("Year(fact_produksi.tgl_produksi)"), 2022)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        $window_production_sales = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->select('nama_catalog')
        ->where('nama_category', 'Window')
        ->groupBy('nama_catalog')
        ->pluck('nama_catalog');

        // Wheel
        $wheel_production_2021 = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Wheel')
        ->where(DB::raw("Year(fact_produksi.tgl_produksi)"), 2021)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        $wheel_production_2022 = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Wheel')
        ->where(DB::raw("Year(fact_produksi.tgl_produksi)"), 2022)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        $wheel_production_sales = DB::table('fact_produksi')
        ->join('dim_catalog','fact_produksi.catalog_id','=','dim_catalog.catalog_id')
        ->select('nama_catalog')
        ->where('nama_category', 'Wheel')
        ->groupBy('nama_catalog')
        ->pluck('nama_catalog');

        // Drilldown Sales
        // Door
        $door_sales_2021 = DB::table('fact_penjualan')
        ->join('dim_catalog','fact_penjualan.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Door')
        ->where(DB::raw("Year(fact_penjualan.tgl_bayar)"), 2021)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        $door_sales_2022 = DB::table('fact_penjualan')
        ->join('dim_catalog','fact_penjualan.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Door')
        ->where(DB::raw("Year(fact_penjualan.tgl_bayar)"), 2022)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        // Lamp
        $lamp_sales_2021 = DB::table('fact_penjualan')
        ->join('dim_catalog','fact_penjualan.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Lamp')
        ->where(DB::raw("Year(fact_penjualan.tgl_bayar)"), 2021)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        $lamp_sales_2022 = DB::table('fact_penjualan')
        ->join('dim_catalog','fact_penjualan.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Lamp')
        ->where(DB::raw("Year(fact_penjualan.tgl_bayar)"), 2022)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        // Window
        $window_sales_2021 = DB::table('fact_penjualan')
        ->join('dim_catalog','fact_penjualan.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Window')
        ->where(DB::raw("Year(fact_penjualan.tgl_bayar)"), 2021)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        $window_sales_2022 = DB::table('fact_penjualan')
        ->join('dim_catalog','fact_penjualan.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Window')
        ->where(DB::raw("Year(fact_penjualan.tgl_bayar)"), 2022)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        // Wheel
        $wheel_sales_2021 = DB::table('fact_penjualan')
        ->join('dim_catalog','fact_penjualan.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Wheel')
        ->where(DB::raw("Year(fact_penjualan.tgl_bayar)"), 2021)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        $wheel_sales_2022 = DB::table('fact_penjualan')
        ->join('dim_catalog','fact_penjualan.catalog_id','=','dim_catalog.catalog_id')
        ->where('nama_category', 'Wheel')
        ->where(DB::raw("Year(fact_penjualan.tgl_bayar)"), 2022)
        ->select(DB::raw("CAST(SUM(jumlah_barang) as int) as jumlah_barang"))
        ->groupBy('nama_catalog')
        ->pluck('jumlah_barang');

        return view('admin.dashboard', compact('total_harga_2021', 'bulan', 'total_harga_2022',
        'jumlah_barang_2021', 'jumlah_barang_2022', 'jumlah_produksi_2021', 'jumlah_produksi_2022',
        'qc_pass_2022', 'qc_no_pass_2022', 'qc_pass_2021', 'qc_no_pass_2021', 'top5_barang_2021',
        'top5_barang_2022', 'barang_2021', 'barang_2022', 'top5_produksi_2021', 'top5_produksi_2022',
        'produksi_2021', 'produksi_2022', 'category_terjual_2021', 'category_terjual_2022',
        'category_produksi_2021', 'category_produksi_2022', 'category',
        'door_production_2021', 'door_production_2022', 'door_production_sales',
        'lamp_production_2021', 'lamp_production_2022', 'lamp_production_sales',
        'window_production_2021', 'window_production_2022', 'window_production_sales',
        'wheel_production_2021', 'wheel_production_2022', 'wheel_production_sales',
        'door_sales_2021', 'door_sales_2022', 'lamp_sales_2021', 'lamp_sales_2022',
        'window_sales_2021', 'window_sales_2022', 'wheel_sales_2021', 'wheel_sales_2022'));
    }
}
