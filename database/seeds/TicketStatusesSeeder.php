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
            'default' => true,
        ]);

        DB::table('ticket_statuses')->insert([
            'name' => 'Solved',
            'color' => '#15a000',
            'close' => true,
            'default' => true,
        ]);

        DB::table('ticket_statuses')->insert([
            'name' => 'Re Open',
            'color' => '#8a2be2 ',
            'close' => false,
            'default' => false,
        ]);
    }
}
