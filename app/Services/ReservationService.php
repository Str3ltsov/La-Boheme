<?php

namespace App\Services;

use App\Models\Reservation;
use App\Models\ReservationType;
use Illuminate\Database\Eloquent\Collection;

class ReservationService implements ReservationServiceInterface
{
    public function getReservationTypes(): Collection
    {
        return ReservationType::all();
    }

    /*public function getAvailableTimeOptions($timeOptions)
    {
        $datesAndTimes = Reservation::select('date_and_time')->get();

        $times = $datesAndTimes->map(function ($dateAndTime) {
            return $dateAndTime->date_and_time = $dateAndTime->date_and_time->format('H:i');
        });

        //

        dd($times);
    }*/
}
