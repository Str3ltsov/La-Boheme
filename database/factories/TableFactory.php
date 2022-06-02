<?php

namespace Database\Factories;

use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table>
 */
class TableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Table::class;

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
            'reservation_type_id' => rand(1, 2),
            'created_at' => $dateTime,
            'updated_at' => $dateTime
        ];
    }
}
