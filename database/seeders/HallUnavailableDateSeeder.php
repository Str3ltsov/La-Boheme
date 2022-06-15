<?php

namespace Database\Seeders;

use App\Models\HallUnavailableDate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HallUnavailableDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HallUnavailableDate::factory()->count(5)->create();
    }
}
