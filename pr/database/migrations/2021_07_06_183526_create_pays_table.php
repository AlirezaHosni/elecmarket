<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('card_number')->nullable();
            $table->string('token')->nullable();
            $table->string('status_pay')->nullable();
            $table->string('pay_type')->nullable();
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pays');
    }
}
