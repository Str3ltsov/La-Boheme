<?php

namespace App\Http\Livewire;

use App\Services\ReservationService;
use App\Services\ReservationServiceInterface;
use Livewire\Component;

class ReservationForm extends Component
{
    public $reservation_type;
    public $date;

    public int $currentStep = 1;

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
            'heading' => '6/6',
            'description' => 'Paslaugos patvirtinimas'
        ]
    ];

    public array $validationRules = [
        1 => [
            'reservation_type' => ['required'],
            'date' => ['required']
        ],
        2 => [],
        3 => [],
        4 => [],
        5 => [],
        6 => []
    ];

    public function goToNextStep()
    {
        $this->validate($this->validationRules[$this->currentStep]);
        $this->currentStep++;
    }

    public function goToPreviousStep()
    {
        $this->currentStep--;
    }

    public function submit()
    {
        $rules = collect($this->validationRules)->collapse()->toArray();
        $this->validate($rules);

        //

        $this->reset();
        $this->resetValidation();
    }

    public function render(ReservationServiceInterface $service)
    {
        return view('livewire.reservation.form')
            ->extends('layouts.app')
            ->section('content')
            ->with('reservationTypes', $service->getReservationTypes());
    }
}
