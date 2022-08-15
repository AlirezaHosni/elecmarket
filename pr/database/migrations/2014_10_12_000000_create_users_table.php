<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class  CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email', '120')->nullable();
            $table->string('phone', '60')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('is_seller')->default(0);
            $table->tinyInteger('is_admin')->default(0);
            //$table->tinyInteger('is_bazzar')->default(0);
            $table->string('identifiercode')->nullable();

            $table->string('type_identity');//seller //marker
            $table->string('card_bank')->nullable();
            $table->string('code_shaba')->nullable();
            $table->tinyInteger('order_buy')->default('1');
            $table->string('bank_account')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
