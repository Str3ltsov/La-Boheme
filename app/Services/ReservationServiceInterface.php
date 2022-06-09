<?php

namespace App\Services;

interface ReservationServiceInterface
{
    public function getReservationTypes();
    public function getValidationRules($reservationType);
    public function makeRulesReadableByValidate($validationRules);
    public function getEmployees();
    public function createClient($name, $email, $phoneNumber, $additionalInfo);
    public function getTableIds();
    public function getHallIds();
    public function combineDateAndTime($date, $time);
    public function createReservation(
        $tables,
        $halls,
        $dateAndTime,
        $numberOfPeople,
        $reservationTypeId,
        $client
    );
    public function updateTableOrHallToUnavailable($reservation);
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
    );
    public function getReservationQuestions($reservationType);
    public function createReservationQuestionAnswers($reservation, $questions, $answersAndComments);
    public function getChosenEmployees($waiter, $bartender);
    public function createReservationEmployees($reservation, $chosenEmployees);
    public function updateChosenEmployeesToUnavailable($chosenEmployees);
}
