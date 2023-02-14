<?php

namespace Database\Seeders;

use App\Models\Fiztren;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiztrenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fiztren::factory()->count(10)->create();
    }
}