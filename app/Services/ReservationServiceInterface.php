<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Reservation;

use Illuminate\Http\RedirectResponse;
use Illuminate\Mail\SentMessage;
use Illuminate\Database\Eloquent\Collection;

interface ReservationServiceInterface
{
    public function getReservationTypes(): Collection|RedirectResponse;
    public function getValidationRules($reservationType): array|RedirectResponse;
    public function makeRulesReadableByValidate($validationRules): array;
    public function getEmployees(): Collection|RedirectResponse;
    public function createClient($name, $email, $phoneNumber, $additionalInfo): Client|RedirectResponse;
    public function getTableIds(): Collection|RedirectResponse;
    public function getHallIds(): Collection|RedirectResponse;
    public function createReservation(
        $tables, $halls, $startDatetime, $numberOfPeople, $reservationTypeId, $client
    ): Reservation|RedirectResponse;
    //public function updateTableOrHallToUnavailable($reservation);
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
    ): array|RedirectResponse;
    public function getReservationQuestions($reservationType): array|RedirectResponse;
    public function createReservationQuestionAnswers($reservation, $questions, $answersAndComments);
    public function getChosenEmployees($waiter, $bartender): array|RedirectResponse;
    public function createReservationEmployees($reservation, $chosenEmployees);
    //public function updateChosenEmployeesToUnavailable($chosenEmployees);
    public function sendReservationSentEmail($client): ?SentMessage;
}
