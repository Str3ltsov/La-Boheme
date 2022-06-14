<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Mail\SentMessage;

interface ReservationsServiceInterface
{
    public function getReservationsWithClients(): Collection|RedirectResponse;
    public function getReservationId(object $request): int|RedirectResponse;
    public function getReservationStatusFromRequest(object $request): int;
    public function updateReservationStatus(int $reservationStatus, int $reservationId): void;
    public function getClientEmailFromReservation(int $reservationId): Client|RedirectResponse;
    public function sendReservationStatusUpdateEmail(object $client, int $reservationStatus): ?SentMessage;
}
