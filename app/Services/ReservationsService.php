<?php

namespace App\Services;

use App\Helpers\Constants;
use App\Mail\ReservationStatusUpdateMail;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Reservation;
use App\Models\ReservationQuestion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\SentMessage;

class ReservationsService implements ReservationsServiceInterface
{
    public function getReservationsWithClients(): Collection|array
    {
        $reservations = Reservation::select(
            'clients.name',
            'clients.email',
            'clients.phone_number',
            'reservations.start_datetime',
            'reservations.number_of_people',
            'reservations.reservation_type_id',
            'reservations.reservation_status_id',
            'reservations.id'
        )
            ->join(
                'clients',
                'clients.id',
                '=',
                'reservations.client_id'
            )
            ->get();

        if ($reservations->isEmpty()) {
            return [];
        }

        return $reservations;
    }

    public function getReservationById(int $id): Reservation|RedirectResponse
    {
        $reservation = Reservation::find($id);

        if (empty($reservation)) {
            return redirect()
                ->route('admin.reservations')
                ->with('error', __('Failed to find reservation by id'));
        }

        return $reservation;
    }

    public function getReservationEmployeesByReservationId(int $id): Collection|array
    {
        $reservationEmployees = Employee::select(
            'employees.name',
            'employees.employee_type_id',
            'reservation_employees.reservation_id'
        )
            ->join(
                'reservation_employees',
                'reservation_employees.employee_id',
                '=',
                'employees.id'
            )
            ->where('reservation_employees.reservation_id', $id)
            ->get();

        if (empty($reservationEmployees)) {
            return [];
        }

        return $reservationEmployees;
    }

    public function getReservationQuestionsAnswersByReservationId(int $id): Collection|array
    {
        $reservationQuestionsAnswers = ReservationQuestion::select(
            'reservation_questions.question',
            'reservation_questions.reservation_type_id',
            'reservation_question_answers.answer',
            'reservation_question_answers.comment',
            'reservation_question_answers.reservation_id',
        )
            ->join(
                'reservation_question_answers',
                'reservation_question_answers.reservation_question_id',
                '=',
                'reservation_questions.id'
            )
            ->where('reservation_question_answers.reservation_id', $id)
            ->get();

        if (empty($reservationQuestionsAnswers)) {
            return [];
        }

        return $reservationQuestionsAnswers;
    }

    public function getReservationIdFromRequest(object $request): int|RedirectResponse
    {
        $reservationId = $request->reservationId;

        if (is_null($reservationId)) {
            return redirect()
                ->route('admin.reservations')
                ->with('error', __('Failed to find reservation id from request'));
        }

        return $reservationId;
    }

    public function getReservationStatusFromRequest(object $request): int
    {
        return $request->validated('reservationStatus');
    }

    public function updateReservationStatus(int $reservationStatus, int $reservationId): void
    {
        $reservation = Reservation::find($reservationId);

        $reservation->reservation_status_id = $reservationStatus;
        $reservation->save();
    }

    public function getClientEmailFromReservation(int $reservationId): Client|RedirectResponse
    {
        $client = Client::select('clients.email')
            ->join(
                'reservations',
                'reservations.client_id',
                '=',
                'clients.id'
            )
            ->where('reservations.id', $reservationId)
            ->first();

        if (empty($client)) {
            return redirect()
                ->route('admin.reservations')
                ->with('error', __('Failed to find client email from reservation'));
        }

        return $client;
    }

    public function sendReservationStatusUpdateEmail(object $client, int $reservationStatus): ?SentMessage
    {
        $statusMessage = [
            'acceptedStatus' => 'J??s?? paslaugos statusas tapo patvirtintas.',
            'declinedStatus' => 'J??s?? paslaugos statusas tapo nutrauktas.',
            'absentStatus' => 'J??s?? paslaugos statusas tapo neatvykimas.'
        ];

        if (class_exists(ReservationStatusUpdateMail::class)) {
            if ($reservationStatus == Constants::reservationStatusInAccepted) {
                return Mail::to($client->email)->send(
                    new ReservationStatusUpdateMail($statusMessage['acceptedStatus'])
                );
            }
            else if ($reservationStatus == Constants::reservationStatusInDeclined) {
                return Mail::to($client->email)->send(
                    new ReservationStatusUpdateMail($statusMessage['declinedStatus'])
                );
            }
            else if ($reservationStatus == Constants::reservationStatusInAbsent) {
                return Mail::to($client->email)->send(
                    new ReservationStatusUpdateMail($statusMessage['absentStatus'])
                );
            }
        }

        return null;
    }
}
