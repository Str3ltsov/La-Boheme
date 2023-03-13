<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservation_statuses')->insert([
            ['name' => 'Pending'],
            ['name' => 'Approved'],
            ['name' => 'Disapproved'],
            ['name' => 'Absence']
        ]);
    }
}
