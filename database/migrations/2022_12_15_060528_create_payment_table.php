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
        Schema::create('payment', function (Blueprint $table) {
            $table->comment('');
            $table->integer('payment_id', true);
            $table->integer('order_id')->index('ord_to_pay');
            $table->string('pay_bank', 50)->nullable();
            $table->bigInteger('pay_norek')->nullable();
            $table->date('tgl_bayar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
};
