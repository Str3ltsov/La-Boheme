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
                'name' => 'Vyr. trenerio',
                'description' => ''
            ],
            [
                'name' => 'Vyr. trenerio asistento',
                'description' => ''
            ],
            [
                'name' => 'Fizinio rengimo trenerio',
                'description' => ''
            ]
        ]);
    }
}
