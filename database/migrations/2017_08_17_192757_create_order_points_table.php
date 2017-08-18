<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('order_points', function (Blueprint $table) {
            $table->integer('card_id')->unsigned();
            //$table->integer('order_id')->unsigned();
            $table->integer('points')->unsigned();
            $table->timestamps();

            $table->foreign('card_id')->references('id')->on('points')->onDelete('cascade');
            //$table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_points');
    }
}
