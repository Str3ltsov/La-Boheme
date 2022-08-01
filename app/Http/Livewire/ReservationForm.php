<?php

namespace App\Http\Livewire;

use App\Helpers\Constants;
use App\Models\Client;
use App\Models\Hall;
use App\Models\Reservation;
use App\Models\Table;
use App\Services\ReservationService;
use App\Services\ReservationServiceInterface;
use App\Traits\UseDatesTimes;
use Livewire\Component;

class ReservationForm extends Component
{
    use UseDatesTimes;

    private ReservationService $service;

    public function boot(ReservationServiceInterface $service)
    {
        $this->service = $service;
    }

    public array $employees = [];

    public function mount()
    {
        $this->employees = $this->service->getRandomEmployees();
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
    //public $employee_waiter;
    //public $employee_bartender;
    /*
     * Step 5 properties
     */
    public $client_name;
    public $client_email;
    public $client_phone_number;
    public $client_additional_info;
    /*
     * Step 6 properties
     */
    public $accept;

    public int $currentStep = 1;

    public array $steps = [
        1 => [
            'step' => '1/5',
            'description' => 'Pasirinkite paslaugos tipą ir datą'
        ],
        2 => [
            'step' => '2/5',
            'description' => 'Pasirinkti laiką ir žmonių skaičių'
        ],
        3 => [
            'step' => '3/5',
            'description' => 'Užpildykite papildomą informaciją'
        ],
        /*4 => [
            'step' => '4/6',
            'description' => 'Pasirinkite jūs aptarnausiantį personalą'
        ],*/
        4 => [
            'step' => '4/5',
            'description' => 'Užpildykite kontaktinę informaciją'
        ],
        5 => [
            'step' => '5/5',
            'description' => 'Paslaugos patvirtinimas'
        ]
    ];

    public array $times = [];

    protected function messages()
    {
        return [
            'reservation_type.required' => 'Nepasirinkote paslaugos tipo',
            'date.required' => 'Nepasirinkote datos',
            'time.required' => 'Nepasirinkote laiko',
            'number_of_people.required' => 'Nenurodėte žmonių skaičiaus',
            'number_of_people.min' => $this->reservation_type == Constants::reservationTypeHall ?
                'Žmonių skaičius turi būti didesnis negu 8' : 'Žmonių skaičius turi būti bent 1',
            'number_of_people.max' => 'Žmonių skaičius turi būti mažesnis negu 8',
            'question_one_answer.required' => 'Reikalaujama užpildyti',
            'question_two_answer.required' => 'Reikalaujama užpildyti',
            'question_three_answer.required' => 'Reikalaujama užpildyti',
            'question_four_answer.required' => 'Reikalaujama užpildyti',
            'question_five_answer.required' => 'Reikalaujama užpildyti',
            'question_six_answer.required' => 'Reikalaujama užpildyti',
            'question_seven_answer.required' => 'Reikalaujama užpildyti',
            'client_name.required' => 'Nenurodėte vardo',
            'client_email.required' => 'Nenurodėte el. pašto adreso',
            'client_email.email' => 'Nurodėte negaliojantį el. pašto adreso formatu',
            'client_phone_number.required' => 'Nenurodėte telefono numerio',
            'accept.required' => 'Nepažymėjote, kad sutikote su svetainės privatumo politiką'
        ];
    }

    /*public array $employeeNames = [];

    public function goToFifthStepWithEmployeeNames()
    {
        //Going to next step
        $this->goToNextStep();

        //Getting employee names using their ids
        $this->employeeNames = $this->service->getEmployeeNames(
            $this->employee_waiter, $this->employee_bartender
        );
    }*/

    public function addTimesAndGoToNextStep()
    {
        /*
         * Going to next step
         */
        $this->goToNextStep();

        /*
         * Adding available times depending on the day of week.
         */
        $unavailableDateTimes = $this->getUnavailableDateTimesByReservationType($this->reservation_type);

        $this->getDayOfTheWeek($this->date);
        $times = $this->getTimesBasedOnDay();

        $this->times = $this->getAvailableTimesByDate($unavailableDateTimes, $this->date, $times);
    }

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
        /*
         * Validating
         */
        $validationRules = $this->service->getValidationRules($this->reservation_type);
        $rules = $this->service->makeRulesReadableByValidate($validationRules);

        $this->validate($rules);

        /*
         * Creating instance of client
         */
        $client = $this->service->createClient(
            $this->client_name,
            $this->client_email,
            $this->client_phone_number,
            $this->client_additional_info
        );

        /*
         * Creating instance of reservation
         */
        $tables = $this->service->getTables();
        $halls = $this->service->getHalls();
        $startDatetime = $this->combineDateAndTime($this->date, $this->time);
        $reservation = $this->service->createReservation(
            $tables,
            $halls,
            $startDatetime,
            $this->number_of_people,
            $this->reservation_type,
            $client
        );

        /*
         * Creating instances of reservation question answers
         */
        $questions = $this->service->getReservationQuestions($this->reservation_type);
        $answersAndComments = $this->service->getAnswersAndComments(
            $this->question_one_answer,
            $this->question_one_comment,
            $this->question_two_answer,
            $this->question_two_comment,
            $this->question_three_answer,
            $this->question_three_comment,
            $this->question_four_answer,
            $this->question_four_comment,
            $this->question_five_answer,
            $this->question_five_comment,
            $this->question_six_answer,
            $this->question_six_comment,
            $this->question_seven_answer,
        );

        $this->service->createReservationQuestionAnswers(
            $reservation,
            $questions,
            $answersAndComments
        );

        /*
         * Creating instances of reservation employees
         */
        /*$chosenEmployees = $this->service->getChosenEmployees(
            $this->employee_waiter,
            $this->employee_bartender
        );*/

        $this->service->createReservationEmployees($reservation, $this->employees);

        /*
         * Send email
         */
        //$this->service->sendReservationSentEmail($client);

        /*
         * Resetting
         */
        $this->reset();
        $this->resetValidation();

        return redirect()
            ->route('reservation.saved')
            ->with('success', __('Successfully saved reservation'));
    }

    public function render()
    {
        return view('livewire.reservation.form')
            ->extends('layouts.app')
            ->section('content')
            ->with([
                'reservationTypes' => $this->service->getReservationTypes(),
                'employees' => $this->employees
            ]);
    }
}
