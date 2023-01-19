<?php

namespace Database\Seeders;

use App\Models\Vyrtren;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VyrtrenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vyrtren::factory()->count(2)->create();
    }
}
