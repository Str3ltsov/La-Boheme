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
                'name' => 'Staliuko rezervacija',
                'description' => '(iki 8 žmonų)'
            ],
            [
                'name' => 'Šventės užsakymas',
                'description' => '(daugiau nei 8 žmonės)'
            ]
        ]);
    }
}
