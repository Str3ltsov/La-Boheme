<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

interface ReservationsServiceInterface
{
    public function getReservationsWithClients(): Collection|RedirectResponse;
    public function getReservationId(object $request): int|RedirectResponse;
    public function updateReservationStatus(object $request, int $reservationId): void;
}
