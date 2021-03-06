<?php

namespace Database\Factories;

use App\Models\Table;
use App\Models\TableUnavailableDateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TableUnavailableDateTime>
 */
class TableUnavailableDateTimeFactory extends Factory
{
    protected $model = TableUnavailableDateTime::class;

    public function definition()
    {
        $faker = $this->faker;
        $dateTime = $faker->dateTimeThisMonth()->format('Y-m-d H:i:s');

        return [
            'table_id' => rand(1, count(Table::all())),
            'unavailable_datetime' => now()
                ->setTime(12, 00)
                ->addDays(rand(1, 30))
                ->addHours(rand(1, 10)),
            'created_at' => $dateTime,
            'updated_at' => $dateTime
        ];
    }
}
