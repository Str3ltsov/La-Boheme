<?php

namespace App\Http\Livewire;

use App\Helpers\Constants;
use App\Services\ReservationService;
use App\Services\ReservationServiceInterface;
use App\Traits\UseDatesTimes;
use Illuminate\Database\Eloquent\Collection;
use \Illuminate\Session\SessionManager;
use Livewire\Component;

class ReservationForm extends Component
{
    use UseDatesTimes;

    private ReservationService $service;
    private mixed $session;

    public function boot(ReservationServiceInterface $service, SessionManager $session)
    {
        $this->service = $service;
        $this->session = $session;
    }

    public int $currentStep = 1;
//    public array $startTimes = [];
//    public array $endTimes = [];
    public bool $isChecked = false;
    public ?Collection $coaches = null;
    public array $adminEmails = [
        'info' => 'info@mbm2pries2.lt',
        'events' => 'events@mbm2pries2.lt'
    ];

    public function mount()
    {
        //$this->employees = $this->service->getRandomEmployees();
    }

    /*
     * Step 1 properties
     */
    public $reservation_type;
//    public $date;
//    /*
//     * Step 2 properties
//     */
//    public $time_from;
//    public $time_to;
//    public $number_of_people;
    /*
     * Step 2 properties
     */
    public $question_one_answer;
    public $question_two_answer;
    public $question_three_answer;
    public $question_four_answer;
//    public $question_four_answer = [];
//    public $question_five_answer;
//    public $question_six_answer;
    public $question_one_comment;
    public $question_two_comment;
    public $question_three_comment;
    public $question_four_comment;
//    public $question_five_comment;
//    public $question_six_comment;
    /*
     * Step 3 properties
     */
    public $coach;
    /*
     * Step 4 properties
     */
    public $client_name;
    public $client_email;
    public $client_phone_number;
    public $client_additional_info;
    /*
     * Step 5 properties
     */
    public $accept;

    protected function messages()
    {
        return [
            'reservation_type.required' => 'Required to fill out',
//            'date.required' => 'Nepasirinkote datos',
//            'time_from.required' => 'Nepasirinkote pradžios laiko',
//            'time_to.required' => 'Nepasirinkote pabaigos laiko',
//            'number_of_people.required' => 'Nenurodėte žmonių skaičiaus',
//            'number_of_people.min' => $this->reservation_type == Constants::reservationTypeHall
//                ? 'Žmonių skaičius turi būti didesnis negu 8'
//                : 'Žmonių skaičius turi būti bent 1',
//            'number_of_people.max' => 'Žmonių skaičius turi būti mažesnis negu 8',
            'question_one_answer.required' => 'Required to fill out',
            'question_two_answer.required' => 'Required to fill out',
            'question_three_answer.required' => 'Required to fill out',
            'question_four_answer.required' => 'Required to fill out',
//            'question_five_answer.required' => 'Reikalaujama užpildyti',
//            'question_six_answer.required' => 'Reikalaujama užpildyti',
            'coach.required' => 'Required to fill in',
            'client_name.required' => 'Name not specified',
            'client_email.required' => 'Email not specified',
            'client_email.email' => 'You have provided an email address with invalid format',
            'client_phone_number.required' => 'Telephone not specified',
            'accept.required' => "You have not indicated that you have accepted the site's privacy policy"
        ];
    }

    public function chooseDesc($rezType) {
        switch ($rezType){
            case Constants::reservationTypeVyrtren :
                return 'Help us choose the best Head Coach for you';
            case Constants::reservationTypeVyrtrenass :
                return "Help us choose the best Assistant to the Head Coach for you";
            case Constants::reservationTypeFiztren:
                return 'Help us choose the best Physical Training Coach for you';
        }
    }

    protected function steps()
    {
        return [
            1 => [
                'step' => '1/5',
                'description' => 'Choose what coach you are looking for?'
            ],
//            2 => [
//                'step' => '2/5',
//                'description' => 'Pasirinkti laiką'
//            ],
            2 => [
                'step' => '2/5',
                'description' => $this->chooseDesc($this->reservation_type),
            ],
            3 => [
                'step' => '3/5',
                'description' => 'Choose a coach from the list of offers'
            ],
            4 => [
                'step' => '4/5',
                'description' => 'Fill in the contact information'
            ],
            5 => [
                'step' => '5/5',
                'description' => 'My reservation'
            ]
        ];
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

    public function goToThirdStepWithTrainers()
    {
        //Going to next step
        $this->goToNextStep();

        //Getting trainers depending on the reservation type
        if ($this->reservation_type == Constants::reservationTypeVyrtren)
            $this->coaches = $this->service->getVyrtren();

        if ($this->reservation_type == Constants::reservationTypeVyrtrenass)
            $this->coaches = $this->service->getVyrtrenass();

        if ($this->reservation_type == Constants::reservationTypeFiztren)
            $this->coaches = $this->service->getFiztren();
    }

//    public function GoToNextStepAndAddStartTimes()
//    {
//        $this->goToNextStep();
//
//        $unavailableDateTimes = $this->getUnavailableDateTimesByReservationType($this->reservation_type);
//
//        $this->setAndGetDayOfTheWeek($this->date);
//
//        $times = $this->getTimesBasedOnDay();
//
//        $this->startTimes = $this->getAvailableTimesByDate($unavailableDateTimes, $this->date, $times);
//    }

//    public function setAndGetEndTimes() {
//
//        $this->endTimes = $this->removeEndTimesBeforeAndAfterStartTime(
//            $this->reservation_type,
//            $this->startTimes,
//            $this->time_from
//        );
//    }

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
        $vyrtren = $this->service->getVyrtren();
        $vyrtrenass = $this->service->getVyrtrenass();
        $fiztren = $this->service->getFiztren();
//        $startDatetime = $this->combineDateAndTime($this->date, $this->time_from);
//        $endDatetime = $this->combineDateAndTime($this->date, $this->time_to);
        $reservation = $this->service->createReservation(
//            $this->date,
//            $startDatetime,
//            $endDatetime,
//            $this->number_of_people,
            $this->reservation_type,
            $this->coach,
            $client
        );
//        if ($this->reservation_type !== Constants::reservationTypeVyrtren)
//            unset($answersAndComments[4]);
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
//            $this->question_five_answer,
//            $this->question_five_comment,
//            $this->question_six_answer,
//            $this->question_six_comment,
        );

        if ($this->reservation_type !== Constants::reservationTypeVyrtren)
            unset($answersAndComments[4]);
        $this->service->createReservationQuestionAnswers(
            $reservation,
            $questions,
            $answersAndComments
        );

        /*
         * Create unique reservation review token for client to be able to review.
         */
        $this->service->createReservationReviewToken($reservation->id);
        $token = $this->service->getReservationReviewToken($reservation->id);

        /*
         * Send emails
         */
//        $this->service->sendReservationSentEmail($client);
//        $this->service->sendReservationSentForAdminsEmail($this->adminEmails['info']);
//        $this->service->sendReservationSentForAdminsEmail($this->adminEmails['events']);
//        $this->service->sendReservationReviewEmail($this->client_email, $reservation->id, $token);

        /*
         * Add reservation type cookie
         */
        $this->session->put('reservationType', $this->reservation_type);

        /*
         * Resetting
         */
        $this->reset();
        $this->resetValidation();

        return redirect()
            ->route('reservation.success')
            ->with('success', __('Reservation has been successfully accepted'));
    }

    public function render()
    {
        return view('livewire.reservation.form')
            ->extends('layouts.app')
            ->section('content')
            ->with([
                'steps' => $this->steps(),
                'reservationTypes' => $this->service->getReservationTypes(),
                //'employees' => $this->employees
            ]);
    }
}
