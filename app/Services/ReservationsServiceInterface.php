<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Mail\SentMessage;

interface ReservationsServiceInterface
{
    public function getReservations(): Collection|array;
    public function getReservationById(int $id): Reservation|RedirectResponse;
    public function getReservationEmployeesByReservationId(int $id): Collection|array;
    public function getReservationQuestionsAnswersByReservationId(int $id): Collection|array;
    public function getReservationIdFromRequest(object $request): int|RedirectResponse;
    public function getReservationStatusFromRequest(object $request): int;
    public function updateReservationStatus(int $reservationStatus, int $reservationId): void;
    public function getClientEmailFromReservation(int $reservationId): Client|RedirectResponse;
    public function sendReservationStatusUpdateEmail(object $client, int $reservationStatus): SentMessage|RedirectResponse;
    public function getReservationReviewToken(int $id): ?string;
    public function deleteReservationReviewToken(int $id): void;
}
