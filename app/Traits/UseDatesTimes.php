<?php

namespace App\Traits;

use App\Helpers\Constants;
use App\Models\HallUnavailableDate;
use App\Models\HallUnavailableDateTime;
use App\Models\TableUnavailableDate;
use App\Models\TableUnavailableDateTime;
use Illuminate\Http\RedirectResponse;
use DateTime;

trait UseDatesTimes {
    /*
     * Retrieve times depending on the day of the week
     */
    private function getWeekdayTimes(): array
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

    private function getWeekendTimes(): array
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

    public function getTimesBasedOnDay(string $date): array
    {
        $weekend = date('N', strtotime($date));

        if ($weekend >= 6) {
            return $this->getWeekendTimes();
        }

        return $this->getWeekdayTimes();
    }

    /*
     * Combine separate date and time inputs into one datetime
     */
    public function combineDateAndTime(string $date, string $time): null|string
    {
        return date('Y-m-d H:i:s', strtotime("$date $time"));
    }

    /*
     * Retrieve unavailable times depending on the date selected
     */
    private function getTableUnavailableDateTimesArray(): array|RedirectResponse
    {
        $tableUnavailableDateTimes = TableUnavailableDateTime::select('unavailable_datetime')
            ->get();

        if ($tableUnavailableDateTimes->isEmpty()) {
            return redirect()
                ->route('home')
                ->with('error', 'Failed to retrieve table unavailable datetimes');
        }

        return $tableUnavailableDateTimes->toArray();
    }

    private function getHallUnavailableDateTimesArray(): array|RedirectResponse
    {
        $hallUnavailableDateTimes = HallUnavailableDateTime::select('unavailable_datetime')
            ->get();

        if ($hallUnavailableDateTimes->isEmpty()) {
            return redirect()
                ->route('home')
                ->with('error', 'Failed to retrieve hall unavailable datetimes');
        }

        return $hallUnavailableDateTimes->toArray();
    }

    public function getUnavailableDateTimesByReservationType(int $reservationType)
    {
        if ($reservationType == Constants::reservationTypeTable) {
            return $this->getTableUnavailableDateTimesArray();
        }
        else if ($reservationType == Constants::reservationTypeHall) {
            return $this->getHallUnavailableDateTimesArray();
        }

        return redirect()
            ->route('home')
            ->with('error', 'Failed to retrieve unavailable datetimes by reservation type');
    }

    public function getAvailableTimesByDate(array $unavailableDateTimes, string $date, array $times): array
    {
        for ($i = 0; $i < count($unavailableDateTimes); $i++) {
            $unavailableDateTime = date_create($unavailableDateTimes[$i]['unavailable_datetime']);
            if ($unavailableDateTime->format('Y-m-d') == $date) {
                if (($key = array_search($unavailableDateTime->format('H:i'), $times)) !== false) {
                    unset($times[$key]);
                }
            }
        }

        return $times;
    }

    /*
     * Retrieve unavailable dates depending on the reservation type selected
     */
    private function getTableUnavailableDatesArray(): array|RedirectResponse
    {
        $tableUnavailableDates = TableUnavailableDate::select('unavailable_date')
            ->get();

        if ($tableUnavailableDates->isEmpty()) {
            return redirect()
                ->route('home')
                ->with('error', 'Failed to retrieve table unavailable dates');
        }

        return $tableUnavailableDates->toArray();
    }

    private function getHallUnavailableDatesArray(): array|RedirectResponse
    {
        $hallUnavailableDates = HallUnavailableDate::select('unavailable_date')
            ->get();

        if ($hallUnavailableDates->isEmpty()) {
            return redirect()
                ->route('home')
                ->with('error', 'Failed to retrieve hall unavailable dates');
        }

        return $hallUnavailableDates->toArray();
    }

    public function getUnavailableDatesByReservationType(int $reservationType): array|RedirectResponse
    {
        if ($reservationType == Constants::reservationTypeTable) {
            return $this->getTableUnavailableDatesArray();
        }
        else if ($reservationType == Constants::reservationTypeHall) {
            return $this->getHallUnavailableDatesArray();
        }

        return redirect()
            ->route('home')
            ->with('error', 'Failed to retrieve unavailable dates by reservation type');
    }

    public function getUnavailableDates(array $unavailableDates): array
    {
        $newUnavailableDates = [];

        for ($i = 0; $i < count($unavailableDates); $i++) {
            $newUnavailableDates[] = date(
                'Y-m-d',
                strtotime($unavailableDates[$i]['unavailable_date'])
            );
        }

        return $newUnavailableDates;
    }
}
