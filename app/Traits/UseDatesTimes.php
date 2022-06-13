<?php

namespace App\Traits;

use App\Models\Reservation;
use DateTime;

trait UseDatesTimes {
    public function getWeekdayTimes(): array
    {
        $weekdayTimes = [
            '17:00', '18:00', '19:00', '20:00',
            '21:00', '22:00', '23:00', '24:00'
        ];

        if (empty($weekdayTimes)) {
            return [];
        }

        return $weekdayTimes;
    }

    public function getWeekendTimes(): array
    {
        $weekendTimes = [
            '12:00', '13:00', '14:00', '15:00',
            '16:00', '17:00', '18:00', '19:00',
            '20:00', '21:00', '22:00', '23:00',
            '24:00'
        ];

        if (empty($weekendTimes)) {
            return [];
        }

        return $weekendTimes;
    }

    public function getTimesBasedOnDay(string $date, array $weekdayTimes, array $weekendTimes): array
    {
        $weekend = date('N', strtotime($date));

        if ($weekend >= 6) {
            return $weekendTimes;
        }

        return $weekdayTimes;
    }

    public function combineDateAndTime(string $date, string $time): null|string
    {
        return date('Y-m-d H:i:s', strtotime("$date $time"));
    }

    public function getUnavailableDateTimes(): array
    {
        return [];
    }

    public function getAvailableTimesByDate(array $unavailableDateTimes, string $date, array $times): array
    {
        for ($i = 0; $i < count($unavailableDateTimes); $i++) {
            if ($unavailableDateTimes[$i]->format('Y-m-d') == $date) {
                if (($key = array_search($unavailableDateTimes[$i]->format('H:i'), $times)) !== false) {
                    unset($times[$key]);
                }
            }
        }

        return $times;
    }

    /*public function pushNewUnavailableDateTime(string $dateTime, array $unavailableDateTimes): array
    {
        $dateTime = DateTime::createFromFormat('Y-m-d H:i', $dateTime);
        $unavailableDateTimes[] = $dateTime;

        return $unavailableDateTimes;
    }*/
}
