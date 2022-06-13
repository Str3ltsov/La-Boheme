<?php

namespace App\Services;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\RedirectResponse;

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

    public function updateReservationStatus(object $request, int $reservationId): void
    {
        $reservationStatus = $request->validated('reservationStatus');
        $reservation = Reservation::find($reservationId);

        $reservation->reservation_status_id = $reservationStatus;
        $reservation->save();
    }
}
