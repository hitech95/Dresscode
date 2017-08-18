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
        DB::table('employee_role')->insert([
            'role_id' => 1,
            'employee_id' => 1,
        ]);
    }
}
