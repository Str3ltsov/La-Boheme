<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\Reservation;
use App\Models\ReservationQuestion;
use App\Models\ReservationType;

class ReservationService implements ReservationServiceInterface
{
    public function getReservationTypes()
    {
        $data = ReservationType::all();

        if ($data->isEmpty()) {
            return back()
                ->withErrors('Failed to retrieve reservation types.');
        }

        return $data;
    }

    public function getReservationQuestions($reservationType)
    {
        $data = ReservationQuestion::all()
            ->where('reservation_type_id', $reservationType);

        if ($data->isEmpty()) {
            return back()
                ->withErrors('Failed to retrieve reservation questions.');
        }

        return $data;
    }

    public function getValidationRules($reservationType)
    {
        return [
            1 => [
                'reservation_type' => ['required'],
                'date' => ['required']
            ],
            2 => [
                'time' => ['required'],
                'number_of_people' => ['required']
            ],
            3 => [
                'question_one_answer' => ['required'],
                'question_two_answer' => ['required'],
                'question_three_answer' => ['required'],
                'question_four_answer' => ['required'],
                'question_five_answer' => ['required'],
                'question_six_answer' => $reservationType == 2 ? ['required'] : [],
                'question_seven_answer' => $reservationType == 2 ? ['required'] : []
            ],
            4 => [
                'employee_waiter' => ['required'],
                'employee_bartender' => ['required']
            ],
            5 => [
                'client_name' => ['required'],
                'client_email' => ['required', 'email'],
                'client_phone_number' => ['required']
            ],
            6 => []
        ];
    }

    public function getEmployees()
    {
        $data = Employee::all();

        if ($data->isEmpty()) {
            return back()
                ->withErrors('Failed to retrieve employees.');
        }

        return $data;
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
