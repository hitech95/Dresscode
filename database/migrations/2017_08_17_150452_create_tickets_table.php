<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->integer('priority')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('employee_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('ticket_statuses')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('ticket_categories')->onDelete('cascade');
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
        Schema::dropIfExists('tickets');
    }
}
