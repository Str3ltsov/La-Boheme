<?php

namespace App\Http\Controllers;

use App\Services\ReservationsService;
use App\Services\ReservationsServiceInterface;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Foundation\Application;

class ReviewController extends Controller
{
    private ReservationsService $service;

    public function __construct(ReservationsServiceInterface $service)
    {
        $this->service = $service;
    }

    public function reservationReview(int $id, Request $request): View|Factory|Redirector|RedirectResponse|Application
    {
        $reservation = $this->service->getReservationById($id);
        $token = $this->service->getReservationReviewToken($id);

        if ($request->query()['token'] == $token) {
            if (!$reservation->rating)
                return view('review.index')
                    ->with('reservation', $this->service->getReservationById($id));
            else
                return redirect('/reservation')
                    ->with('info', __('You have already reviewed this reservation'));
        }

        abort(404);
    }

    public function reservationReviewSave(int $id, Request $request): Redirector|RedirectResponse|Application
    {
        $validated = $request->validate(['rating' => 'required|integer|min:1|max:5']);

        try {
            $reservation = $this->service->getReservationById($id);
            $reservation->rating = $validated['rating'] ?? NULL;
            $reservation->save();

            $this->service->deleteReservationReviewToken($id);

            return redirect('/reservation')
                ->with('success', __('Thank you for submitting your review'));
        }
        catch (\Error $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }
}
