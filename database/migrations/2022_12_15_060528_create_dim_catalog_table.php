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
        Schema::create('dim_catalog', function (Blueprint $table) {
            $table->comment('');
            $table->integer('catalog_id')->nullable();
            $table->string('nama_catalog', 50)->nullable();
            $table->integer('cat_id')->nullable();
            $table->string('nama_category', 50)->nullable();
            $table->double('harga')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dim_catalog');
    }
};
