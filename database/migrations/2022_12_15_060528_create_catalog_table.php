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
        Schema::create('catalog', function (Blueprint $table) {
            $table->comment('');
            $table->integer('catalog_id', true);
            $table->integer('cat_id')->index('category_to_catalog');
            $table->string('nama_barang', 50);
            $table->string('slug', 256);
            $table->string('tipe', 50)->nullable();
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 11);
            $table->string('image', 100)->nullable();
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog');
    }
};
