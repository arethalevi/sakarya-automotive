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
        Schema::create('fact_penjualan', function (Blueprint $table) {
            $table->comment('');
            $table->bigInteger('sk_waktu')->nullable();
            $table->integer('catalog_id')->nullable();
            $table->integer('jumlah_barang')->nullable();
            $table->decimal('harga_satuan', 22, 0)->nullable();
            $table->double('harga_total')->nullable();
            $table->dateTime('tgl_bayar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fact_penjualan');
    }
};
