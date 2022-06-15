<?php

namespace Database\Seeders;

use App\Models\TableUnavailableDateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableUnavailableDateTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TableUnavailableDateTime::factory()->count(5)->create();
    }
}
