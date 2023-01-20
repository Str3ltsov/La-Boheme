<?php

namespace Database\Seeders;

use App\Models\FiztrenUnavailableDate;
use App\Models\HallUnavailableDate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiztrenUnavailableDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FiztrenUnavailableDate::factory()->count(5)->create();
    }
}
