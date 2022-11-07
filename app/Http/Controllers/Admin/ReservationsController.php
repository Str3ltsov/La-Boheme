<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateReservationStatusRequest;
use App\Services\ReservationsService;
use App\Services\ReservationsServiceInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class ReservationsController extends Controller
{
    private ReservationsService $service;

    public function __construct(ReservationsServiceInterface $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(): Factory|View|Application
    {
        return view('admin.reservations.index')
            ->with('reservations', $this->service->getReservationsWithClients());
    }

    public function show($id): Factory|View|Application
    {
        return view('admin.reservations.show')
            ->with([
                'reservation' => $this->service->getReservationById($id),
                'reservationEmployees' => $this->service->getReservationEmployeesByReservationId($id),
                'reservationQuestionsAnswers' =>
                    $this->service->getReservationQuestionsAnswersByReservationId($id)
            ]);
    }

    public function updateReservationStatus(UpdateReservationStatusRequest $request): RedirectResponse
    {
        $reservationId = $this->service->getReservationIdFromRequest($request);
        $reservationStatus = $this->service->getReservationStatusFromRequest($request);
        $this->service->updateReservationStatus($reservationStatus, $reservationId);

        //$client = $this->service->getClientEmailFromReservation($reservationId);
        //$this->service->sendReservationStatusUpdateEmail($client, $reservationStatus);

        return redirect()
            ->route('admin.reservations')
            ->with('success', __('Užsakymo būsena sėkmingai atnaujinta'));
    }
}
