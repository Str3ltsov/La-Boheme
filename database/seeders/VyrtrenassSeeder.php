<?php

namespace Database\Seeders;

use App\Models\Vyrtren;
use App\Models\Vyrtrenass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VyrtrenassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vyrtrenass::factory()->count(2)->create();
    }
}
