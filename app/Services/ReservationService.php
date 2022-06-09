<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Hall;
use App\Models\Reservation;
use App\Models\ReservationEmployee;
use App\Models\ReservationQuestion;
use App\Models\ReservationQuestionAnswer;
use App\Models\ReservationType;
use App\Models\Table;

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
            6 => ['accept' => ['required']]
        ];
    }

    public function makeRulesReadableByValidate($validationRules)
    {
        return collect($validationRules)->collapse()->toArray();
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

    public function createClient($name, $email, $phoneNumber, $additionalInfo)
    {
        return Client::create([
            'name' => $name,
            'email' => $email,
            'phone_number' => $phoneNumber,
            'additional_information' => $additionalInfo,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function getCreatedClientId($client)
    {
        return $client->id;
    }

    public function combineDateAndTime($date, $time)
    {
        return date('Y-m-d H:i:s', strtotime("$date $time"));
    }

    public function createReservation($dateAndTime, $numberOfPeople, $reservationTypeId, $client)
    {
        $tables = Table::select('id')->get();
        $halls = Hall::select('id')->get();

        $randomTable = rand(1, count($tables));
        $randomHalls = rand(1, count($halls));

        return Reservation::create([
            'date_and_time' => $dateAndTime,
            'number_of_people' => $numberOfPeople,
            'reservation_type_id' => $reservationTypeId,
            'table_id' => $reservationTypeId == 1 ? $randomTable : NULL,
            'hall_id' => $reservationTypeId == 2 ? $randomHalls : NULL,
            'client_id' => $client->id,
            'reservation_status_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function getAnswersAndComments(
        $questionOneAnswer,
        $questionOneComment,
        $questionTwoAnswer,
        $questionTwoComment,
        $questionThreeAnswer,
        $questionThreeComment,
        $questionFourAnswer,
        $questionFourComment,
        $questionFiveAnswer,
        $questionFiveComment,
        $questionSixAnswer,
        $questionSixComment,
        $questionSevenAnswer
    )
    {
        return $answersAndComments = [
            1 => [
                'answer' => $questionOneAnswer,
                'comment' => $questionOneComment
            ],
            2 => [
                'answer' => $questionTwoAnswer,
                'comment' => $questionTwoComment
            ],
            3 => [
                'answer' => $questionThreeAnswer,
                'comment' => $questionThreeComment
            ],
            4 => [
                'answer' => $questionFourAnswer,
                'comment' => $questionFourComment
            ],
            5 => [
                'answer' => $questionFiveAnswer,
                'comment' => $questionFiveComment
            ],
            6 => [
                'answer' => $questionSixAnswer,
                'comment' => $questionSixComment
            ],
            7 => ['answer' => $questionSevenAnswer]
        ];
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

    public function createReservationQuestionAnswers($reservation, $questions, $answersAndComments)
    {
        for ($i = 0; $i < count($questions); $i++) {
            ReservationQuestionAnswer::create([
                'reservation_question_id' => $questions[$i]->id,
                'reservation_id' => $reservation->id,
                'answer' => $answersAndComments[$i + 1]['answer'],
                'comment' => $answersAndComments[$i + 1]['comment'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    public function getChosenEmployees($waiter, $bartender)
    {
        return [
            1 => $waiter,
            2 => $bartender
        ];
    }

    public function createReservationEmployees($reservation, $chosenEmployees)
    {
        for ($i = 1; $i <= count($chosenEmployees); $i++) {
            ReservationEmployee::create([
                'reservation_id' => $reservation->id,
                'employee_id' => $chosenEmployees[$i],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    public function updateChosenEmployeesToUnavailable($chosenEmployees)
    {
        for ($i = 1; $i <= count($chosenEmployees); $i++) {
            $employee = Employee::find($chosenEmployees[$i]);
            $employee->available = false;
            $employee->save();
        }
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
