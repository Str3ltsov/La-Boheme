<?php

namespace Database\Factories;

use App\Models\Hall;
use App\Models\HallUnavailableDate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HallUnavailableDate>
 */
class HallUnavailableDateFactory extends Factory
{
    protected $model = HallUnavailableDate::class;

    public function definition()
    {
        $faker = $this->faker;
        $dateTime = $faker->dateTimeThisMonth()->format('Y-m-d H:i:s');

        return [
            'hall_id' => rand(1, count(Hall::all())),
            'unavailable_date' => now()
                ->addDays(rand(1, 30)),
            'created_at' => $dateTime,
            'updated_at' => $dateTime
        ];
    }
}
