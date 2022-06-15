<?php

namespace Database\Seeders;

use App\Models\HallUnavailableDateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HallUnavailableDateTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HallUnavailableDateTime::factory()->count(5)->create();
    }
}
