<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->string('format');
            $table->integer('width');
            $table->integer('height');
            $table->integer('parent_id')->unsigned();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('media')->onDelete('cascade');
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
        Schema::dropIfExists('media');
    }
}
