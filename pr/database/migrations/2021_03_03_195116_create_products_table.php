<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('title');
            $table->text('description_short')->nullable();
            $table->text('description')->nullable();
            $table->text('points')->nullable();
            $table->text('fani')->nullable();
            $table->string('cover')->nullable();
            $table->string('meta_title');
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('slug');
            $table->string('price');
            $table->bigInteger('stock')->default(0);
            $table->string('weight')->nullable();
            $table->string('warranty')->nullable();
            $table->string('view_count')->default('0');
            $table->tinyInteger('show_price')->default('1');
            $table->tinyInteger('is_demo')->default('0');
            $table->tinyInteger('is_stock')->default('0');
            $table->tinyInteger('feature_items')->default('0');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
