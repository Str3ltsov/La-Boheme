<?php

namespace Database\Seeders;

use App\Models\VyrtrenassUnavailableDate;
use App\Models\VyrtrenUnavailableDate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VyrtrenUnavailableDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VyrtrenUnavailableDate::factory()->count(5)->create();
    }
}
