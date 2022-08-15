<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->string('score')->nullable();
            $table->string('buy_max_category')->nullable();
            $table->timestamp('agree_start')->nullable();
            $table->timestamp('agree_end')->nullable();
            $table->string('income_max')->nullable();
            $table->string('heir_name')->nullable();
            $table->string('code_seller_seller')->nullable();
            $table->string('discount_percent_seller')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marketers');
    }
}
