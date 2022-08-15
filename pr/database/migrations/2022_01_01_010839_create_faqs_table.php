<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catfaq_id');
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->text('des')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('count')->default(0);
            $table->timestamps();
//            $table->foreign('catfaq_id')->references('id')->on('catfaqs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faqs');
    }
}
