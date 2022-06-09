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

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

class ReservationService implements ReservationServiceInterface
{
    public function getReservationTypes(): Collection|RedirectResponse
    {
        $reservationTypes = ReservationType::all();

        if ($reservationTypes->isEmpty()) {
            return redirect()
                ->route('home')
                ->with('error', 'Failed to retrieve reservation types');
        }

        return $reservationTypes;
    }

    public function getValidationRules($reservationType): array|RedirectResponse
    {
        $validationRules = [
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

        if (empty($validationRules)) {
            return redirect()
                ->route('home')
                ->with('error', 'Failed to retrieve validation rules');
        }

        return $validationRules;
    }

    public function makeRulesReadableByValidate($validationRules): array
    {
        return collect($validationRules)->collapse()->toArray();
    }

    public function getEmployees(): Collection|RedirectResponse
    {
        $employees = Employee::all();

        if ($employees->isEmpty()) {
            return redirect()
                ->route('home')
                ->with('error', 'Failed to retrieve employees');
        }

        return $employees;
    }

    public function createClient($name, $email, $phoneNumber, $additionalInfo)
    : Client|RedirectResponse
    {
        $client = Client::create([
            'name' => $name,
            'email' => $email,
            'phone_number' => $phoneNumber,
            'additional_information' => $additionalInfo,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($client->wasRecentlyCreated) {
            return $client;
        }
        else {
            return redirect()
                ->route('home')
                ->with('error', 'Failed to create reservation');
        }
    }

    public function getTableIds(): Collection|RedirectResponse
    {
        $tables = Table::select('id')->where('available', true)->get();

        if ($tables->isEmpty()) {
            return redirect()
                ->route('home')
                ->with('error', 'Failed to retrieve tables');
        }

        return $tables;
    }

    public function getHallIds(): Collection|RedirectResponse
    {
        $halls = Hall::select('id')->where('available', true)->get();

        if ($halls->isEmpty()) {
            return redirect()
                ->route('home')
                ->with('error', 'Failed to retrieve halls');
        }

        return $halls;
    }

    public function combineDateAndTime($date, $time): string
    {
        return date('Y-m-d H:i:s', strtotime("$date $time"));
    }

    public function createReservation(
        $tables,
        $halls,
        $dateAndTime,
        $numberOfPeople,
        $reservationTypeId,
        $client
    ): Reservation|RedirectResponse
    {
        $randomTable = rand(1, count($tables));
        $randomHalls = rand(1, count($halls));

        $reservation = Reservation::create([
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

        if ($reservation->wasRecentlyCreated) {
            return $reservation;
        }
        else {
            return redirect()
                ->route('home')
                ->with('error', 'Failed to create reservation');
        }
    }

    public function updateTableOrHallToUnavailable($reservation)
    {
        if ($reservation->reservation_type_id == 1) {
            $table = Table::find($reservation->table_id);

            if (empty($table)) {
                return redirect()
                    ->route('home')
                    ->with('error', 'Failed to find table by id');
            }

            $table->available = false;
            $table->save();
        }
        else if ($reservation->reservation_type_id == 2) {
            $hall = Hall::find($reservation->hall_id);

            if (empty($hall)) {
                return redirect()
                    ->route('home')
                    ->with('error', 'Failed to find hall by id');
            }

            $hall->available = false;
            $hall->save();
        }
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
    ): array|RedirectResponse
    {
        $answersAndComments = [
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

        if (empty($answersAndComments)) {
            return redirect()
                ->route('home')
                ->with('error', 'Failed to retrieve validation rules');
        }

        return $answersAndComments;
    }

    public function getReservationQuestions($reservationType): array|RedirectResponse
    {
        if ($reservationType != null) {
            $reservationQuestions = ReservationQuestion::all()
                ->where('reservation_type_id', $reservationType);

            if ($reservationQuestions->isEmpty()) {
                return redirect()
                    ->route('home')
                    ->with('error', 'Failed to retrieve reservation questions');
            }

            $reservationQuestions = $reservationQuestions->toArray();
            array_unshift($reservationQuestions,"");
            unset($reservationQuestions[0]);

            return $reservationQuestions;
        }
    }

    public function createReservationQuestionAnswers($reservation, $questions, $answersAndComments)
    {
        for ($i = 1; $i <= count($questions); $i++) {
            $reservationQuestionAnswer = ReservationQuestionAnswer::create([
                'reservation_question_id' => $questions[$i]['id'],
                'reservation_id' => $reservation->id,
                'answer' => $answersAndComments[$i]['answer'],
                'comment' => $answersAndComments[$i]['comment'] ?? NULL,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            if (!$reservationQuestionAnswer->wasRecentlyCreated) {
                return redirect()
                    ->route('home')
                    ->with('error', 'Failed to create reservation question answer');
            }
        }
    }

    public function getChosenEmployees($waiter, $bartender): array|RedirectResponse
    {
        $chosenEmployees = [
            1 => $waiter,
            2 => $bartender
        ];

        if (empty($chosenEmployees)) {
            return redirect()
                ->route('home')
                ->with('error', 'Failed to retrieve validation rules');
        }

        return $chosenEmployees;
    }

    public function createReservationEmployees($reservation, $chosenEmployees)
    {
        for ($i = 1; $i <= count($chosenEmployees); $i++) {
            $reservationEmployee = ReservationEmployee::create([
                'reservation_id' => $reservation->id,
                'employee_id' => $chosenEmployees[$i],
                'created_at' => now(),
                'updated_at' => now()
            ]);

            if (!$reservationEmployee->wasRecentlyCreated) {
                return redirect()
                    ->route('home')
                    ->with('error', 'Failed to create reservation employee');
            }
        }
    }

    public function updateChosenEmployeesToUnavailable($chosenEmployees)
    {
        for ($i = 1; $i <= count($chosenEmployees); $i++) {
            $employee = Employee::find($chosenEmployees[$i]);

            if (empty($employee)) {
                return redirect()
                    ->route('home')
                    ->with('error', 'Failed to find employee by id');
            }

            $employee->available = false;
            $employee->save();
        }
    }
}
