<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Fiztren;
use App\Models\Reservation;
use App\Models\Vyrtren;
use App\Models\Vyrtrenass;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Mail\SentMessage;
use Illuminate\Database\Eloquent\Collection;

interface ReservationServiceInterface
{
//    public function getRandomEmployees(): array|RedirectResponse;
    public function getReservationTypes(): Collection|RedirectResponse;
    public function getValidationRules(mixed $reservationType): array|RedirectResponse;
    public function makeRulesReadableByValidate(array $validationRules): array;
//    public function getEmployees(): Collection|RedirectResponse;
    //public function getEmployeeNames(int $waiter, int $bartender): array;
    public function createClient(string $name, string $email, string $phoneNumber, string|null $additionalInfo)
    : Client|RedirectResponse;
//    public function getTables(): Collection|RedirectResponse;
//    public function getHalls(): Collection|RedirectResponse;

    public function getVyrtren(): Collection|RedirectResponse;

    public function getVyrtrenass(): Collection|RedirectResponse;

    public function getFiztren(): Collection|RedirectResponse;

    public function createReservation(
        mixed $vyrtren,
        mixed $vyrtrenass,
        mixed $fiztren,
//        string $startDatetime,
//        string $endDatetime,
//        int $numberOfPeople,
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
//        mixed $questionFiveAnswer,
//        mixed $questionFiveComment,
//        mixed $questionSixAnswer,
//        mixed $questionSixComment
    ): array|RedirectResponse;
    public function getReservationQuestions(int $reservationType): array|RedirectResponse;
    public function createReservationQuestionAnswers(object $reservation, mixed $questions, array $answersAndComments)
    : int|RedirectResponse;
    //public function getChosenEmployees($waiter, $bartender): array|RedirectResponse;
    public function createReservationEmployees(object $reservation, array $chosenEmployees): int|RedirectResponse;
    public function sendReservationSentEmail(object $client): SentMessage|RedirectResponse;
    public function sendReservationSentForAdminsEmail(string $email): SentMessage|RedirectResponse;
}
