<?php

namespace Database\Factories;

use App\Models\Table;
use App\Models\Vyrtren;
use App\Models\Vyrtrenass;
use App\Models\VyrtrenassUnavailableDateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VyrtrenassUnavailableDateTime>
 */
class VyrtrenassUnavailableDateTimeFactory extends Factory
{
    protected $model = VyrtrenassUnavailableDateTime::class;

    public function definition()
    {
        $faker = $this->faker;
        $dateTime = $faker->dateTimeThisMonth()->format('Y-m-d H:i:s');

        return [
            'vyrtrenass_id' => rand(1, count(Vyrtrenass::all())),
            'unavailable_datetime' => now()
                ->setTime(12, 00)
                ->addDays(rand(1, 30))
                ->addHours(rand(1, 10)),
            'created_at' => $dateTime,
            'updated_at' => $dateTime
        ];
    }
}
