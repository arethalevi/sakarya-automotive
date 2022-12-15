<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_penjualan', function (Blueprint $table) {
            $table->comment('');
            $table->integer('oi_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('catalog_id')->nullable();
            $table->dateTime('tgl_bayar')->nullable();
            $table->integer('jumlah_barang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_penjualan');
    }
};
