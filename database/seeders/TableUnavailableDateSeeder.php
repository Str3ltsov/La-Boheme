<?php

namespace Database\Seeders;

use App\Models\TableUnavailableDate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableUnavailableDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TableUnavailableDate::factory()->count(5)->create();
    }
}
