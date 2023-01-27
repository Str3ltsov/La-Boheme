<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateVyrtrenassUnavailableDateRequest;
use App\Http\Requests\CreateVyrtrenassUnavailableDateTimeRequest;
use App\Http\Requests\DeleteVyrtrenassUnavailableDateRequest;
use App\Http\Requests\DeleteVyrtrenassUnavailableDateTimeRequest;
use App\Services\VyrtrenassService;
use App\Services\VyrtrenassServiceInterface;
use App\Traits\UseDatesTimes;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class VyrtrenassController extends Controller
{
    use useDatesTimes;

    private VyrtrenassService $service;

    public function __construct(VyrtrenassServiceInterface $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(): Factory|View|Application
    {
        return view('admin.vyrtrenass.index')
            ->with('tables', $this->service->getVyrtrens());
    }

    public function show($id): Factory|View|Application
    {
        return view('admin.vyrtrenass.show')
            ->with([
                'table' => $this->service->getVyrtrenassDetails($id),
                'unavailable_dates' => $this->service->getVyrtrenassUnavailableDates($id),
                'unavailable_datetimes' => $this->service->getVyrtrenassUnavailableDateTimes($id)
            ]);
    }

    public function create(): RedirectResponse
    {
        $this->service->createVyrtrens();

        return redirect()
            ->back()
            ->with('success', __('Successfully created a new table'));
    }

    public function destroy($id): RedirectResponse
    {
        $this->service->deleteVyrtrenass($id);

        return redirect()
            ->route('admin.vyrtrenasss')
            ->with('success', __('Successfully deleted table'));
    }

    public function createUnavailableDate(CreateVyrtrenassUnavailableDateRequest $request): RedirectResponse
    {

        $this->service->createVyrtrenassUnavailableDate($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully created a new unavailable date'));
    }

    public function deleteUnavailableDate(DeleteVyrtrenassUnavailableDateRequest $request): RedirectResponse
    {
        $this->service->deleteVyrtrenassUnavailableDate($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully deleted unavailable date'));
    }

    public function createUnavailableDateTime(CreateVyrtrenassUnavailableDateTimeRequest $request): RedirectResponse
    {
        $this->service->createVyrtrenassUnavailableDateTime($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully created new unavailable date time'));
    }

    public function deleteUnavailableDateTime(DeleteVyrtrenassUnavailableDateTimeRequest $request): RedirectResponse
    {
        $this->service->deleteVyrtrenassUnavailableDateTime($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully deleted unavailable date time'));
    }
}
