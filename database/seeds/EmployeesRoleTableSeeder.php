<?php

use Illuminate\Database\Seeder;

class EmployeesRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employe_role')->insert([
            'role_id' => 1,
            'employe_id' => 1,
        ]);
    }
}
