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
        Schema::create('order_item', function (Blueprint $table) {
            $table->comment('');
            $table->integer('oi_id', true);
            $table->integer('order_id')->nullable()->index('ord_to_oi');
            $table->integer('catalog_id')->nullable()->index('cat_to_oi');
            $table->integer('harga')->nullable();
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
        Schema::dropIfExists('order_item');
    }
};
