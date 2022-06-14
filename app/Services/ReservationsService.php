<?php

namespace App\Services;

use App\Mail\ReservationSentMail;
use App\Mail\ReservationStatusUpdateMail;
use App\Models\Client;
use App\Models\Reservation;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\SentMessage;

class ReservationsService implements ReservationsServiceInterface
{
    public function getReservationsWithClients(): Collection|RedirectResponse
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
            return redirect()
                ->route('admin.reservations')
                ->with('error', 'Failed to retrieve reservations');
        }

        return $reservations;
    }

    public function getReservationId(object $request): int|RedirectResponse
    {
        $reservationId = $request->reservationId;

        if (is_null($reservationId)) {
            return redirect()
                ->route('admin.reservations')
                ->with('error', "Failed to retrieve id of reservation");
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
                ->with('error', "Failed to retrieve client email from reservation");
        }

        return $client;
    }

    public function sendReservationStatusUpdateEmail(object $client, int $reservationStatus): ?SentMessage
    {
        $statusMessage = [
            'acceptedStatus' => 'Jūsų paslaugos statusas tapo patvirtintas.',
            'declinedStatus' => 'Jūsų paslaugos statusas tapo nutrauktas.',
            'absentStatus' => 'Jūsų paslaugos statusas tapo neatvykimas.'
        ];

        if (class_exists(ReservationStatusUpdateMail::class)) {
            if ($reservationStatus == 2) {
                return Mail::to($client->email)->send(
                    new ReservationStatusUpdateMail($statusMessage['acceptedStatus'])
                );
            }
            else if ($reservationStatus == 3) {
                return Mail::to($client->email)->send(
                    new ReservationStatusUpdateMail($statusMessage['declinedStatus'])
                );
            }
            else if ($reservationStatus == 4) {
                return Mail::to($client->email)->send(
                    new ReservationStatusUpdateMail($statusMessage['absentStatus'])
                );
            }
        }

        return null;
    }
}
