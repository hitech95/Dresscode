<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Administrator',
            'slug' => 'admin',
            'enabled' => true,
        ]);

        DB::table('roles')->insert([
            'name' => 'Support Staff',
            'slug' => 'support',
            'enabled' => true,
        ]);

        DB::table('roles')->insert([
            'name' => 'Shop Owner',
            'slug' => 'owner',
            'enabled' => true,
        ]);

        DB::table('roles')->insert([
            'name' => 'Shop Cashier',
            'slug' => 'cashier',
            'enabled' => true,
        ]);

        DB::table('roles')->insert([
            'name' => 'Shop Manager',
            'slug' => 'manager',
            'enabled' => true,
        ]);
    }
}
