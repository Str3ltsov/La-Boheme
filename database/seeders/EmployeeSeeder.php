<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                'name' => 'Monika Monikaitė',
                'gender' => 'female',
                'avatar' => 'images/avatars/female.png',
                'employee_type_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Erika Erikaitė',
                'gender' => 'female',
                'avatar' => 'images/avatars/female.png',
                'employee_type_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Aušra Aušraitė',
                'gender' => 'female',
                'avatar' => 'images/avatars/female.png',
                'employee_type_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Tomas Tomaitis',
                'gender' => 'male',
                'avatar' => 'images/avatars/male.png',
                'employee_type_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Tadas Tadaitis',
                'gender' => 'male',
                'avatar' => 'images/avatars/male.png',
                'employee_type_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Lukas Lukaitis',
                'gender' => 'male',
                'avatar' => 'images/avatars/male.png',
                'employee_type_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
