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
        Schema::table('order_item', function (Blueprint $table) {
            $table->foreign(['catalog_id'], 'cat_to_oi')->references(['catalog_id'])->on('catalog');
            $table->foreign(['order_id'], 'ord_to_oi')->references(['order_id'])->on('cust_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_item', function (Blueprint $table) {
            $table->dropForeign('cat_to_oi');
            $table->dropForeign('ord_to_oi');
        });
    }
};
