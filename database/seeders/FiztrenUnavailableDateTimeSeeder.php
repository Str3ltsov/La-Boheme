<?php

namespace Database\Seeders;

use App\Models\FiztrenUnavailableDateTime;
use App\Models\HallUnavailableDateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiztrenUnavailableDateTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FiztrenUnavailableDateTime::factory()->count(5)->create();
    }
}
