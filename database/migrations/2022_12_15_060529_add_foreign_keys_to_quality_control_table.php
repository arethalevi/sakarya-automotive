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
        Schema::table('quality_control', function (Blueprint $table) {
            $table->foreign(['production_id'], 'prod_to_qc')->references(['production_id'])->on('production');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quality_control', function (Blueprint $table) {
            $table->dropForeign('prod_to_qc');
        });
    }
};
