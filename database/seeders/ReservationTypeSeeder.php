<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservation_types')->insert([
            [
                'name' => 'Head Coach',
                'description' => ''
            ],
            [
                'name' => 'Assistant to the Head Coach',
                'description' => ''
            ],
            [
                'name' => 'Physical training coach',
                'description' => ''
            ]
        ]);
    }
}
