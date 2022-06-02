<?php

namespace Database\Factories;

use App\Models\ReservationType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReservationTypes>
 */
class ReservationTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReservationType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = $this->faker;

        return [
            'name' => $faker->word(),
            'description' => $faker->text('10')
        ];
    }
}
