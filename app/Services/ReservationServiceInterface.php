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
    public function getValidationRules(mixed $reservationType): array|RedirectResponse;
    public function makeRulesReadableByValidate(array $validationRules): array;
    public function getEmployees(): Collection|RedirectResponse;
    //public function getEmployeeNames(int $waiter, int $bartender): array;
    public function createClient(string $name, string $email, string $phoneNumber, string $additionalInfo)
    : Client|RedirectResponse;
    public function getTableIds(): Collection|RedirectResponse;
    public function getHallIds(): Collection|RedirectResponse;
    public function createReservation(
        mixed $tables,
        mixed $halls,
        string $startDatetime,
        int $numberOfPeople,
        int $reservationType,
        object $client
    ): Reservation|RedirectResponse;
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
    ): array|RedirectResponse;
    public function getReservationQuestions(int $reservationType): array|RedirectResponse;
    public function createReservationQuestionAnswers(object $reservation, mixed $questions, array $answersAndComments)
    : int|RedirectResponse;
    //public function getChosenEmployees($waiter, $bartender): array|RedirectResponse;
    public function getRandomEmployees(): array|RedirectResponse;
    public function createReservationEmployees(object $reservation, array $chosenEmployees): int|RedirectResponse;
    public function sendReservationSentEmail(object $client): ?SentMessage;
}
