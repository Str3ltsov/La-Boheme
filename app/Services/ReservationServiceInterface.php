<?php

namespace App\Services;

interface ReservationServiceInterface
{
    public function getReservationTypes();
    public function getReservationQuestions($reservationType);
    public function getValidationRules($reservationType);
    public function getEmployees();
    //public function getAvailableTimeOptions($timeOptions);
}
