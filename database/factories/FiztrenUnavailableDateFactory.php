<?php

namespace Database\Factories;

use App\Models\Fiztren;
use App\Models\FiztrenUnavailableDate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HallUnavailableDate>
 */
class FiztrenUnavailableDateFactory extends Factory
{
    protected $model = FiztrenUnavailableDate::class;

    public function definition()
    {
        $faker = $this->faker;
        $dateTime = $faker->dateTimeThisMonth()->format('Y-m-d H:i:s');

        return [
            'fiztren_id' => rand(1, count(Fiztren::all())),
            'unavailable_date' => now()
                ->addDays(rand(1, 30)),
            'created_at' => $dateTime,
            'updated_at' => $dateTime
        ];
    }
}
