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
                'description' => 'Vyriausias treneris'
            ],
            [
                'name' => 'Vyr. trenerio assistento',
                'description' => 'Vyriausio trenerio asistentas'
            ],
            [
            'name' => 'Fizinio pasirengimo trenerio',
            'description' => 'Fizinis pasirengimo treneris trenerio asistentas'
            ]
        ]);
    }
}
