<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateVyrtrenUnavailableDateRequest;
use App\Http\Requests\CreateVyrtrenUnavailableDateTimeRequest;
use App\Http\Requests\DeleteVyrtrenUnavailableDateRequest;
use App\Http\Requests\DeleteVyrtrenUnavailableDateTimeRequest;
use App\Models\Vyrtren;
use App\Services\VyrtrenassService;
use App\Services\VyrtrenService;
use App\Services\VyrtrenServiceInterface;
use App\Traits\UseDatesTimes;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class VyrtrenController extends Controller
{
    use useDatesTimes;

    private VyrtrenService $service;

    public function __construct(VyrtrenServiceInterface $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(): Factory|View|Application
    {
        return view('admin.vyrtrens.index')
            ->with('tables', $this->service->getVyrtrens());
    }

    public function show($id): Factory|View|Application
    {
        return view('admin.vyrtrens.show')
            ->with([
                'table' => $this->service->getVyrtrenDetails($id),
                'unavailable_dates' => $this->service->getVyrtrenUnavailableDates($id),
                'unavailable_datetimes' => $this->service->getVyrtrenUnavailableDateTimes($id)
            ]);
    }

    public function create(): RedirectResponse
    {
        $this->service->createVyrtren();

        return redirect()
            ->back()
            ->with('success', __('Successfully created a new table'));
    }

    public function destroy($id): RedirectResponse
    {
        $this->service->deleteVyrtren($id);

        return redirect()
            ->route('admin.vyrtrens')
            ->with('success', __('Successfully deleted table'));
    }

    public function createUnavailableDate(CreateVyrtrenUnavailableDateRequest $request): RedirectResponse
    {
        $this->service->createVyrtrenUnavailableDate($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully created a new unavailable date'));
    }

    public function deleteUnavailableDate(DeleteVyrtrenUnavailableDateRequest $request): RedirectResponse
    {
        $this->service->deleteVyrtrenUnavailableDate($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully deleted unavailable date'));
    }

    public function createUnavailableDateTime(CreateVyrtrenUnavailableDateTimeRequest $request): RedirectResponse
    {
        $this->service->createVyrtrenUnavailableDateTime($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully created new unavailable date time'));
    }

    public function deleteUnavailableDateTime(DeleteVyrtrenUnavailableDateTimeRequest $request): RedirectResponse
    {
        $this->service->deleteVyrtrenUnavailableDateTime($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully deleted unavailable date time'));
    }
}
