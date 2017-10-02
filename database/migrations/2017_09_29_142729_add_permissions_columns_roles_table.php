<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPermissionsColumnsRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->boolean('owner_platform')->default(false);
            $table->boolean('owner_shop')->default(false);

            $table->boolean('manage_shop')->default(false);
            $table->boolean('manage_shop_carts')->default(false);
            $table->boolean('manage_shop_employees')->default(false);
            $table->boolean('manage_shop_orders')->default(false);
            $table->boolean('manage_shop_products')->default(false);
            $table->boolean('manage_shop_tickets')->default(false);

            $table->boolean('manage_brands')->default(false);
            $table->boolean('manage_carts')->default(false);
            $table->boolean('manage_customers')->default(false);
            $table->boolean('manage_employees')->default(false);
            $table->boolean('manage_orders')->default(false);
            $table->boolean('manage_products')->default(false);
            $table->boolean('manage_roles')->default(false);
            $table->boolean('manage_shops')->default(false);
            $table->boolean('manage_tickets')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('owner_platform');
            $table->dropColumn('owner_shop');

            $table->dropColumn('manage_shop');
            $table->dropColumn('manage_shop_carts');
            $table->dropColumn('manage_shop_employees');
            $table->dropColumn('manage_shop_orders');
            $table->dropColumn('manage_shop_products');
            $table->dropColumn('manage_shop_tickets');

            $table->boolean('manage_brands');
            $table->dropColumn('manage_carts');
            $table->dropColumn('manage_customers');
            $table->dropColumn('manage_employees');
            $table->dropColumn('manage_orders');
            $table->dropColumn('manage_products');
            $table->dropColumn('manage_roles');
            $table->dropColumn('manage_shops');
            $table->dropColumn('manage_tickets');
        });
    }
}
