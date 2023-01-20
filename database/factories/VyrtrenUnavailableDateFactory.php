<?php

namespace Database\Factories;

use App\Models\Vyrtren;
use App\Models\VyrtrenUnavailableDate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VyrtrenassUnavailableDate>
 */
class VyrtrenUnavailableDateFactory extends Factory
{
    protected $model = VyrtrenUnavailableDate::class;

    public function definition()
    {
        $faker = $this->faker;
        $dateTime = $faker->dateTimeThisMonth()->format('Y-m-d H:i:s');

        return [
            'vyrtren_id' => rand(1, count(Vyrtren::all())),
            'unavailable_date' => now()
                ->addDays(rand(1, 30)),
            'created_at' => $dateTime,
            'updated_at' => $dateTime
        ];
    }
}
