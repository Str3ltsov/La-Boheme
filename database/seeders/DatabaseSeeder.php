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
            VyrtrenSeeder::class,
            VyrtrenassSeeder::class,
            FiztrenUnavailableDateSeeder::class,
            FiztrenUnavailableDateTimeSeeder::class,
            VyrtrenUnavailableDateSeeder::class,
            VyrtrenUnavailableDateTimeSeeder::class,
            VyrtrenassUnavailableDateSeeder::class,
            VyrtrenassUnavailableDateTimeSeeder::class,
//            ClientSeeder::class,
            ReservationStatusSeeder::class,
            //ReservationSeeder::class,
            ReservationQuestionSeeder::class,
            EmployeeTypeSeeder::class,
            //EmployeeSeeder::class
        ]);
    }
}
