<?php

namespace Database\Factories;

use App\Models\Hall;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    private static int $client_id = 1;

    /*
     * This function returns a new reservation with property values depending on the reservation type.
     * */
    private function newReservation($reservation)
    {
        $randomReservationType = rand(1, 2);

        if ($randomReservationType == 1) {
            $reservation['number_of_people'] = rand(1, 8);
            $reservation['table_id'] = rand(1, count(Table::all()));
            $reservation['reservation_type_id'] = $randomReservationType;
        } else if ($randomReservationType == 2) {
            $reservation['number_of_people'] = rand(8, 16);
            $reservation['hall_id'] = rand(1, count(Hall::all()));
            $reservation['reservation_type_id'] = $randomReservationType;
        }

        return $reservation;
    }

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = $this->faker;
        $dateTime = $faker->unique()->dateTimeThisMonth()->format('Y-m-d H:i:s');
        $startDateTime = $faker->dateTimeBetween($dateTime, 'next Monday +7 days');
        $endDateTime = $faker->dateTimeBetween(
            $startDateTime,
            $startDateTime->format('Y-m-d H:i:s').' +1 days'
        );

        $reservation = [
            'start_datetime' => $startDateTime,
            'end_datetime' => $endDateTime,
            'rating' => NULL,
            'client_id' => self::$client_id++,
            'reservation_status_id' => rand(1, 3),
            'created_at' => $dateTime,
            'updated_at' => $dateTime
        ];

        return $this->newReservation($reservation);
    }
}
