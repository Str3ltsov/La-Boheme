<?php

namespace Database\Seeders;

use App\Models\VyrtrenUnavailableDateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VyrtrenUnavailableDateTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VyrtrenUnavailableDateTime::factory()->count(5)->create();
    }
}
