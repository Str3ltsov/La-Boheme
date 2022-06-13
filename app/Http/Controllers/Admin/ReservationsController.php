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

        $this->service->updateReservationStatus($request, $reservationId);

        return redirect()
            ->route('admin.reservations')
            ->with('success', "Successfully updated reservation status");
    }
}
