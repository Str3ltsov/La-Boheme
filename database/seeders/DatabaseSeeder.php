<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            ReservationTypeSeeder::class,
            FiztrenSeeder::class,
            TableUnavailableDateSeeder::class,
            TableUnavailableDateTimeSeeder::class,
            VyrtrenSeeder::class,
            VyrtrenassSeeder::class,
            HallUnavailableDateSeeder::class,
            HallUnavailableDateTimeSeeder::class,
            ClientSeeder::class,
            ReservationStatusSeeder::class,
            //ReservationSeeder::class,
            ReservationQuestionSeeder::class,
            EmployeeTypeSeeder::class,
            //EmployeeSeeder::class
        ]);
    }
}
