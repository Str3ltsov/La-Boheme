<?php

namespace Database\Factories;

use App\Models\Vyrtren;
use App\Models\VyrtrenUnavailableDateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VyrtrenassUnavailableDateTime>
 */
class VyrtrenUnavailableDateTimeFactory extends Factory
{
    protected $model = VyrtrenUnavailableDateTime::class;

    public function definition()
    {
        $faker = $this->faker;
        $dateTime = $faker->dateTimeThisMonth()->format('Y-m-d H:i:s');

        return [
            'vyrtren_id' => rand(1, count(Vyrtren::all())),
            'unavailable_datetime' => now()
                ->setTime(12, 00)
                ->addDays(rand(1, 30))
                ->addHours(rand(1, 10)),
            'created_at' => $dateTime,
            'updated_at' => $dateTime
        ];
    }
}
