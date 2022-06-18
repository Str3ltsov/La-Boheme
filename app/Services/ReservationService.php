<?php

namespace App\Services;

use App\Helpers\Constants;
use App\Mail\ReservationSentMail;
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
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\SentMessage;

class ReservationService implements ReservationServiceInterface
{
    public function getReservationTypes(): Collection|RedirectResponse
    {
        $reservationTypes = ReservationType::all();

        if ($reservationTypes->isEmpty()) {
            return redirect()
                ->route('home')
                ->with('error', 'Failed to find reservation types');
        }

        return $reservationTypes;
    }

    public function getValidationRules(mixed $reservationType): array|RedirectResponse
    {
        $validationRules = [
            1 => [
                'reservation_type' => ['required'],
                'date' => ['required', 'date']
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
                'question_six_answer' => $reservationType == Constants::reservationTypeHall ? ['required'] : [],
                'question_seven_answer' => $reservationType == Constants::reservationTypeHall ? ['required'] : []
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
                ->with('error', 'Failed to find validation rules');
        }

        return $validationRules;
    }

    public function makeRulesReadableByValidate(array $validationRules): array
    {
        return collect($validationRules)->collapse()->toArray();
    }

    public function getEmployees(): Collection|RedirectResponse
    {
        $employees = Employee::all();

        if ($employees->isEmpty()) {
            return redirect()
                ->route('home')
                ->with('error', 'Failed to find employees');
        }

        return $employees;
    }

    public function getEmployeeNames(int $waiter, int $bartender): array
    {
        $waiterName = Employee::select('name')->where('id', $waiter)->first();
        $bartenderName = Employee::select('name')->where('id', $bartender)->first();

        return [
            $waiter => $waiterName->name,
            $bartender => $bartenderName->name
        ];
    }

    public function createClient(string $name, string $email, string $phoneNumber, string $additionalInfo)
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
                ->with('error', 'Failed to find halls ids');
        }

        return $halls;
    }

    public function createReservation(
        mixed $tables, mixed $halls, string $startDatetime, int $numberOfPeople, int $reservationType, object $client
    ): Reservation|RedirectResponse
    {
        $randomTable = rand(1, count($tables));
        $randomHalls = rand(1, count($halls));

        $reservation = Reservation::create([
            'start_datetime' => $startDatetime,
            'end_datetime' => NULL,
            'number_of_people' => $numberOfPeople,
            'reservation_type_id' => $reservationType,
            'table_id' => $reservationType == Constants::reservationTypeTable ? $randomTable : NULL,
            'hall_id' => $reservationType == Constants::reservationTypeHall ? $randomHalls : NULL,
            'client_id' => $client->id,
            'reservation_status_id' => Constants::reservationStatusInProgress,
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

    public function getAnswersAndComments(
        mixed $questionOneAnswer,
        mixed $questionOneComment,
        mixed $questionTwoAnswer,
        mixed $questionTwoComment,
        mixed $questionThreeAnswer,
        mixed $questionThreeComment,
        mixed $questionFourAnswer,
        mixed $questionFourComment,
        mixed $questionFiveAnswer,
        mixed $questionFiveComment,
        mixed $questionSixAnswer,
        mixed $questionSixComment,
        mixed $questionSevenAnswer
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
                ->with('error', 'Failed to find validation rules');
        }

        return $answersAndComments;
    }

    public function getReservationQuestions(int $reservationType): array|RedirectResponse
    {
        if (!$reservationType == null) {
            $reservationQuestions = ReservationQuestion::all()
                ->where('reservation_type_id', $reservationType);

            if ($reservationQuestions->isEmpty()) {
                return redirect()
                    ->route('home')
                    ->with('error', 'Failed to find reservation questions');
            }

            $reservationQuestions = $reservationQuestions->toArray();
            array_unshift($reservationQuestions,"");
            unset($reservationQuestions[0]);

            return $reservationQuestions;
        }

        return [];
    }

    public function createReservationQuestionAnswers(object $reservation, mixed $questions, array $answersAndComments)
    : int|RedirectResponse
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

        return 0;
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
                ->with('error', 'Failed to find chosen employees');
        }

        return $chosenEmployees;
    }

    public function createReservationEmployees(object $reservation, array $chosenEmployees): int|RedirectResponse
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

        return 0;
    }

    public function sendReservationSentEmail(object $client): ?SentMessage
    {
        if (class_exists(ReservationSentMail::class)) {
            return Mail::to($client->email)->send(new ReservationSentMail());
        }

        return null;
    }
}
