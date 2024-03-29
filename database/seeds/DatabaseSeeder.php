<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmployeesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(EmployeesRoleTableSeeder::class);
        $this->call(TicketStatusesSeeder::class);
    }
}
