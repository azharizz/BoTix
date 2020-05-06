<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReceipt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id('idReceipt');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('cart_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('movie_id')->references('idMovie')->on('movies');
            $table->foreign('cart_id')->references('idCart')->on('carts');
            $table->string('seat');
            $table->tinyInteger('payed');
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
        Schema::dropIfExists('table_receipt');
    }
}
