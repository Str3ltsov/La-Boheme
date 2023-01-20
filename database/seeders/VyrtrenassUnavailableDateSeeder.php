<?php

namespace Database\Seeders;

use App\Models\VyrtrenassUnavailableDate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VyrtrenassUnavailableDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VyrtrenassUnavailableDate::factory()->count(5)->create();
    }
}
