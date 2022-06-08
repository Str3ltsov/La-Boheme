<?php

namespace App\Http\Livewire;

use App\Services\ReservationService;
use App\Services\ReservationServiceInterface;
use Livewire\Component;

class ReservationForm extends Component
{
    private ReservationService $service;

    public function boot(ReservationServiceInterface $service)
    {
        $this->service = $service;
    }

    /*
     * Step 1 properties
     */
    public $reservation_type;
    public $date;
    /*
     * Step 2 properties
     */
    public $time;
    public $number_of_people;
    /*
     * Step 3 properties
     */
    public $question_one_answer;
    public $question_two_answer;
    public $question_three_answer;
    public $question_four_answer;
    public $question_five_answer;
    public $question_six_answer;
    public $question_seven_answer;
    public $question_one_comment;
    public $question_two_comment;
    public $question_three_comment;
    public $question_four_comment;
    public $question_five_comment;
    public $question_six_comment;
    /*
     * Step 4 properties
     */
    public $employee_waiter;
    public $employee_bartender;
    /*
     * Step 5 properties
     */
    public $client_name;
    public $client_email;
    public $client_phone_number;
    public $client_additional_info;

    public int $currentStep = 5;

    public array $steps = [
        1 => [
            'step' => '1/6',
            'description' => 'Pasirinkite paslaugos tipą ir datą'
        ],
        2 => [
            'step' => '2/6',
            'description' => 'Pasirinkti laiką ir žmonių skaičių'
        ],
        3 => [
            'step' => '3/6',
            'description' => 'Užpildykite papildomą informaciją'
        ],
        4 => [
            'step' => '4/6',
            'description' => 'Pasirinkite jūs aptarnausiantį personalą'
        ],
        5 => [
            'step' => '5/6',
            'description' => 'Užpildykite kontaktinę informaciją'
        ],
        6 => [
            'step' => '6/6',
            'description' => 'Paslaugos patvirtinimas'
        ]
    ];

    public array $timeOptions = [
        '11:00', '12:00', '13:00',
        '14:00', '15:00', '16:00',
        '17:00', '18:00', '19:00',
        '20:00', '21:00', '22:00',
    ];

    public function goToNextStep()
    {
        $validationRules = $this->service->getValidationRules($this->reservation_type);

        $this->validate($validationRules[$this->currentStep]);
        $this->currentStep++;
    }

    public function goToPreviousStep()
    {
        $this->currentStep--;
    }

    public function submit()
    {
        $validationRules = $this->service->getValidationRules($this->reservation_type);

        /*
         * Turning validationRules[] into a correct form to be read by validate() when submitting.
         */
        $rules = collect($validationRules)->collapse()->toArray();

        $this->validate($rules);

        //

        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.reservation.form')
            ->extends('layouts.app')
            ->section('content')
            ->with([
                'reservationTypes' => $this->service->getReservationTypes(),
                'reservationQuestions' => $this->service->getReservationQuestions($this->reservation_type),
                'employees' => $this->service->getEmployees()
                //'timeSelectorOptions' => $this->service->getAvailableTimeOptions($this->timeOptions)
            ]);
    }
}
