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
        Schema::create('cust_order', function (Blueprint $table) {
            $table->comment('');
            $table->integer('order_id', true);
            $table->enum('payment_status', ['Paid', 'Unpaid'])->nullable()->default('Unpaid');
            $table->string('name')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('address')->nullable();
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
            $table->bigInteger('user_id')->nullable();
            $table->date('tgl_kirim')->nullable();
            $table->enum('shipping_status', ['Preparing', 'Shipped'])->nullable()->default('Preparing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cust_order');
    }
};
