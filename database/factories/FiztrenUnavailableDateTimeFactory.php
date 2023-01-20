<?php

namespace Database\Factories;

use App\Models\Fiztren;
use App\Models\FiztrenUnavailableDateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HallUnavailableDateTime>
 */
class FiztrenUnavailableDateTimeFactory extends Factory
{
    protected $model = FiztrenUnavailableDateTime::class;

    public function definition()
    {
        $faker = $this->faker;
        $dateTime = $faker->dateTimeThisMonth()->format('Y-m-d H:i:s');

        return [
            'fiztren_id' => rand(1, count(Fiztren::all())),
            'unavailable_datetime' => now()
                ->setTime(12, 00)
                ->addDays(rand(1, 30))
                ->addHours(rand(1, 10)),
            'created_at' => $dateTime,
            'updated_at' => $dateTime
        ];
    }
}
