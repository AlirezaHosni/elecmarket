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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->string('identifiercode')->nullable();
            $table->string('post_string')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->string('seller_state')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('total');
            $table->string('tracking_code')->nullable();
            $table->string('order_status')->nullable();
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('address_id')->references('id')->on('addresses');


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
