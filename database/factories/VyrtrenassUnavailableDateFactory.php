<?php

namespace Database\Factories;

use App\Models\Vyrtrenass;
use App\Models\VyrtrenassUnavailableDate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VyrtrenassUnavailableDate>
 */
class VyrtrenassUnavailableDateFactory extends Factory
{
    protected $model = VyrtrenassUnavailableDate::class;

    public function definition()
    {
        $faker = $this->faker;
        $dateTime = $faker->dateTimeThisMonth()->format('Y-m-d H:i:s');

        return [
            'vyrtrenass_id' => rand(1, count(Vyrtrenass::all())),
            'unavailable_date' => now()
                ->addDays(rand(1, 30)),
            'created_at' => $dateTime,
            'updated_at' => $dateTime
        ];
    }
}