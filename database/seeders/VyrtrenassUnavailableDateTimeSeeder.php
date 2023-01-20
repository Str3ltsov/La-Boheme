<?php

namespace Database\Seeders;

use App\Models\VyrtrenassUnavailableDateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VyrtrenassUnavailableDateTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VyrtrenassUnavailableDateTime::factory()->count(5)->create();
    }
}
