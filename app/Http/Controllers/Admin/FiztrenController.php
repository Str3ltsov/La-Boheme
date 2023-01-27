<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateHallUnavailableDateRequest;
use App\Http\Requests\CreateHallUnavailableDateTimeRequest;
use App\Http\Requests\DeleteHallUnavailableDateRequest;
use App\Http\Requests\DeleteHallUnavailableDateTimeRequest;
use App\Services\HallsService;
use App\Services\HallsServiceInterface;
use App\Traits\UseDatesTimes;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class HallsController extends Controller
{
    use useDatesTimes;

    private HallsService $service;

    public function __construct(HallsServiceInterface $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(): Factory|View|Application
    {
        return view('admin.halls.index')
            ->with('halls', $this->service->getHalls());
    }

    public function show($id): Factory|View|Application
    {
        return view('admin.halls.show')
            ->with([
                'hall' => $this->service->getHallDetails($id),
                'unavailable_dates' => $this->service->getHallUnavailableDates($id),
                'unavailable_datetimes' => $this->service->getHallUnavailableDateTimes($id)
            ]);
    }

    public function create(): RedirectResponse
    {
        $this->service->createHall();

        return redirect()
            ->back()
            ->with('success', __('Successfully created a new hall'));
    }

    public function destroy($id): RedirectResponse
    {
        $this->service->deleteHall($id);

        return redirect()
            ->route('admin.halls')
            ->with('success', __('Successfully deleted hall'));
    }

    public function createUnavailableDate(CreateHallUnavailableDateRequest $request): RedirectResponse
    {
        $this->service->createHallUnavailableDate($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully created new unavailable date'));
    }

    public function deleteUnavailableDate(DeleteHallUnavailableDateRequest $request): RedirectResponse
    {
        $this->service->deleteHallUnavailableDate($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully deleted unavailable date'));
    }

    public function createUnavailableDateTime(CreateHallUnavailableDateTimeRequest $request): RedirectResponse
    {
        $this->service->createHallUnavailableDateTime($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully created new unavailable date time'));
    }

    public function deleteUnavailableDateTime(DeleteHallUnavailableDateTimeRequest $request): RedirectResponse
    {
        $this->service->deleteHallUnavailableDateTime($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully deleted unavailable date time'));
    }
}
