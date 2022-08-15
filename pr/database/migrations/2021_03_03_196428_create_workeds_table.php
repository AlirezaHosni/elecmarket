<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->dateTime('time_special')->nullable();
            $table->tinyInteger('worked')->default(0);
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workeds');
    }
}
