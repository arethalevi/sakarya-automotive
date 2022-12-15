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
        Schema::create('quality_control', function (Blueprint $table) {
            $table->comment('');
            $table->integer('production_id')->primary();
            $table->integer('catalog_id');
            $table->integer('jumlah_barang');
            $table->enum('qc_status', ['Not checked', 'QC Passed', 'QC No Pass'])->nullable()->default('Not checked');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quality_control');
    }
};
