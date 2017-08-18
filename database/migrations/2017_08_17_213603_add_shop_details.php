<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShopDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function($table) {
            $table->string('address')->after('slug');
            $table->string('phone')->after('address');
            $table->string('fax')->after('phone');
            $table->string('vat')->after('fax');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function($table) {
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('fax');
            $table->dropColumn('vat');
        });
    }
}
