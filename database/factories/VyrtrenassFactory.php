<?php

namespace Database\Factories;

use App\Helpers\Constants;
use App\Models\Table;
use App\Models\Vyrtrenass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table>
 */
class VyrtrenassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vyrtrenass::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = $this->faker;
        $dateTime = $faker->dateTimeThisMonth()->format('Y-m-d H:i:s');

        return [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'available' => $faker->boolean(100),
            'reservation_type_id' => Constants::reservationTypeVyrtrenass,
            'created_at' => $dateTime,
            'updated_at' => $dateTime
        ];
    }
}
