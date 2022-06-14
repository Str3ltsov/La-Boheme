<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateReservationStatusRequest;
use App\Services\ReservationsService;
use App\Services\ReservationsServiceInterface;

class ReservationsController extends Controller
{
    private ReservationsService $service;

    public function __construct(ReservationsServiceInterface $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.reservations.index')
            ->with('reservations', $this->service->getReservationsWithClients());
    }

    public function updateReservationStatus(UpdateReservationStatusRequest $request)
    {
        $reservationId = $this->service->getReservationId($request);
        $reservationStatus = $this->service->getReservationStatusFromRequest($request);

        $this->service->updateReservationStatus($reservationStatus, $reservationId);

        $client = $this->service->getClientEmailFromReservation($reservationId);

        $this->service->sendReservationStatusUpdateEmail($client, $reservationStatus);

        return redirect()
            ->route('admin.reservations')
            ->with('success', "Successfully updated reservation status");
    }
}
