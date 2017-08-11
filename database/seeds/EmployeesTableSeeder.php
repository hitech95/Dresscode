<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => 'Administrator',
            'surname' => 'Employe',
            'username' => 'root',
            'password' => bcrypt('dresscode'),
            'enabled' => true,
        ]);
    }
}
