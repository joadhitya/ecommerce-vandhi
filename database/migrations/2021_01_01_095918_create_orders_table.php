<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code');
            $table->integer('id_customer');
            $table->string('address');
            $table->integer('province');
            $table->integer('city');
            $table->string('zip_code');
            $table->string('type_payment');
            $table->integer('total_price');
            $table->string('payment_status');
            $table->integer('order_status');
            $table->integer('weight');
            $table->string('transfer_photo')->nullable();
            $table->string('txnid')->nullable();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
