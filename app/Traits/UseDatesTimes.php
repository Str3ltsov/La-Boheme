<?php

namespace App\Traits;

use App\Helpers\Constants;
use App\Models\FiztrenUnavailableDateTime;
use App\Models\FiztrenUnavailableDate;
use App\Models\VyrtrenUnavailableDate;
use App\Models\VyrtrenUnavailableDateTime;
use App\Models\VyrtrenassUnavailableDate;
use App\Models\VyrtrenassUnavailableDateTime;
use Illuminate\Http\RedirectResponse;

trait UseDatesTimes {
    /*
     * Retrieve times depending on the day of the week
     */
    private string $dayOfTheWeek;

    public function setAndGetDayOfTheWeek(string $date): void
    {
        $this->dayOfTheWeek = date('N', strtotime($date));
    }

    private function createAndGetTimes(int $loopTimes, array $times, string $firstTime): array
    {
        for ($i = 0; $i < $loopTimes; $i++) {
            if ($i != 0) {
                $firstTime = date('H:i', strtotime($firstTime . '+15 minutes'));
            }
            $times[$i] = $firstTime;
        }

        return $times;
    }

    private function getWeekdayTimes(): array
    {
        $weekdayTimes = [];
        static $firstTime = '17:00';

        if ($this->dayOfTheWeek == 1) {
            $weekdayTimes = $this->createAndGetTimes(21, $weekdayTimes, $firstTime);
        }
        else {
            $weekdayTimes = $this->createAndGetTimes(29, $weekdayTimes, $firstTime);
        }

        if (empty($weekdayTimes)) {
            return [];
        }

        return $weekdayTimes;
    }

    private function getWeekendTimes(): array
    {
        $weekendTimes = [];
        static $firstTime = '11:00';

        if ($this->dayOfTheWeek == 6) {
            $weekendTimes = $this->createAndGetTimes(53, $weekendTimes, $firstTime);
        }
        else {
            $weekendTimes = $this->createAndGetTimes(45, $weekendTimes, $firstTime);
        }

        if (empty($weekendTimes)) {
            return [];
        }

        return $weekendTimes;
    }

    public function getTimesBasedOnDay(): array
    {
        if ($this->dayOfTheWeek >= 6) {
            return $this->getWeekendTimes();
        }

        return $this->getWeekdayTimes();
    }

    /*
     * Removing end times from array which come before selected start time
     */
    public function removeEndTimesBeforeAndAfterStartTime(int $reservationType, array $startTimes, string $startTime): array
    {
        $endTimes = [];

        if (in_array($startTime, $startTimes)) {
            if ($startTime < '21:00' && $reservationType == Constants::reservationTypeVyrtren) {
                $endTimes = array_slice($startTimes, array_search($startTime, $startTimes) + 1, 10);
            }
            else {
                $endTimes = array_slice($startTimes, array_search($startTime, $startTimes) + 1);
            }
        }

        return $endTimes;
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
//    private function getTableUnavailableDateTimesArray(): array|RedirectResponse
//    {
//        $vyrtrenUnavailableDateTimes = VyrtrenassUnavailableDateTime::select('unavailable_datetime')
//            ->get();
//
//        if ($vyrtrenUnavailableDateTimes->isEmpty()) {
//            return redirect()
//                ->route('livewire.reservation')
//                ->with('error', __('Failed to get table unavailable date times'));
//        }
//
//        return $vyrtrenUnavailableDateTimes->toArray();
//    }
//
//    private function getHallUnavailableDateTimesArray(): array|RedirectResponse
//    {
//        $hallUnavailableDateTimes = HallUnavailableDateTime::select('unavailable_datetime')
//            ->get();
//
//        if ($hallUnavailableDateTimes->isEmpty()) {
//            return redirect()
//                ->route('livewire.reservation')
//                ->with('error', __('Failed to get hall unavailable date times'));
//        }
//
//        return $hallUnavailableDateTimes->toArray();
//    }

    public function getUnavailableDateTimesArray($type): array|RedirectResponse
    {
        $unavailableDateTimes = [];
        switch ($type) {
            case Constants::reservationTypeVyrtren:
                $unavailableDateTimes = VyrtrenUnavailableDateTime::select('unavailable_datetime')
                    ->get();
                break;

            case Constants::reservationTypeVyrtrenass:
                $unavailableDateTimes = VyrtrenassUnavailableDateTime::select('unavailable_datetime')
                    ->get();
                break;
            case Constants::reservationTypeFiztren:
                $unavailableDateTimes = FiztrenUnavailableDateTime::select('unavailable_datetime')
                    ->get();
                break;
        }
//        $unavailableDateTimes = VyrtrenassUnavailableDateTime::select('unavailable_datetime')
//            ->get();

        if ($unavailableDateTimes->isEmpty()) {
            return redirect()
                ->route('livewire.reservation')
                ->with('error', __('Failed to get table unavailable date times'));
        }

        return $unavailableDateTimes->toArray();
    }
    public function getUnavailableDateTimesByReservationType(int $reservationType): array|RedirectResponse
    {
//        if ($reservationType == Constants::reservationTypeTable) {
//            return $this->getTableUnavailableDateTimesArray();
//        }
//        else if ($reservationType == Constants::reservationTypeHall) {
//            return $this->getHallUnavailableDateTimesArray();
//        }
        return $this->getUnavailableDateTimesArray($reservationType);
        return redirect()
            ->route('livewire.reservation')
            ->with('error', __('Failed to get unavailable date times by reservation type'));
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
//    private function getTableUnavailableDatesArray(): array|RedirectResponse
//    {
//        $tableUnavailableDates = VyrtrenassUnavailableDate::select('unavailable_date')
//            ->get();
//
//        if ($tableUnavailableDates->isEmpty()) {
//            return redirect()
//                ->route('livewire.reservation')
//                ->with('error', __('Failed to get table unavailable dates'));
//        }
//
//        return $tableUnavailableDates->toArray();
//    }
//
//    private function getHallUnavailableDatesArray(): array|RedirectResponse
//    {
//        $hallUnavailableDates = HallUnavailableDate::select('unavailable_date')
//            ->get();
//
//        if ($hallUnavailableDates->isEmpty()) {
//            return redirect()
//                ->route('livewire.reservation')
//                ->with('error', __('Failed to get hall unavailable dates'));
//        }
//
//        return $hallUnavailableDates->toArray();
//    }

    private function getUnavailableDatesArray($type): array|RedirectResponse
    {
//        $tableUnavailableDates = VyrtrenassUnavailableDate::select('unavailable_date')
//            ->get();
    $unavailableDates = [];
    switch ($type) {

        case Constants::reservationTypeVyrtren:
            $unavailableDates = VyrtrenUnavailableDate::select('unavailable_date')
                ->get();
            break;

        case Constants::reservationTypeVyrtrenass:
            $unavailableDates = VyrtrenassUnavailableDate::select('unavailable_date')
                ->get();
            break;
        case Constants::reservationTypeFiztren:
            $unavailableDates = FiztrenUnavailableDate::select('unavailable_date')
                ->get();
            break;
    }
        if ($unavailableDates->isEmpty()) {
            return redirect()
                ->route('livewire.reservation')
                ->with('error', __('Failed to get table unavailable dates'));
        }

        return $unavailableDates->toArray();
    }

    public function getUnavailableDatesByReservationType(int $reservationType): array|RedirectResponse
    {
         return $this->getUnavailableDatesArray($reservationType);

        return redirect()
            ->route('livewire.reservation')
            ->with('error', __('Failed to get unavailable dates by reservation type'));
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
