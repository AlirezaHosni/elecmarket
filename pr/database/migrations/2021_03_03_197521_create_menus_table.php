<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('menu_type')->nullable();
            $table->unsignedBigInteger('page_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
