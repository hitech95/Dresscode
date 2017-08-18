<?php

use Illuminate\Database\Seeder;

class TicketStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_statuses')->insert([
            'name' => 'Pending',
            'color' => '#e69900',
            'close' => false,
        ]);

        DB::table('ticket_statuses')->insert([
            'name' => 'Solved',
            'color' => '#15a000',
            'close' => true,
        ]);
    }
}
