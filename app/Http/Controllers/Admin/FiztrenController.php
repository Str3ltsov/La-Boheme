<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFiztrenUnavailableDateRequest;
use App\Http\Requests\CreateFiztrenUnavailableDateTimeRequest;
use App\Http\Requests\DeleteFiztrenUnavailableDateRequest;
use App\Http\Requests\DeleteFiztrenUnavailableDateTimeRequest;
use App\Models\FiztrenUnavailableDate;
use App\Services\FiztrenService;
use App\Services\FiztrenServiceInterface;
use App\Traits\UseDatesTimes;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class FiztrenController extends Controller
{
    use useDatesTimes;

    private FiztrenService $service;

    public function __construct(FiztrenServiceInterface $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(): Factory|View|Application
    {
        return view('admin.fiztren.index')
            ->with('halls', $this->service->getFiztrens());
    }

    public function show($id): Factory|View|Application
    {
        return view('admin.fiztren.show')
            ->with([
                'hall' => $this->service->getFiztrenDetails($id),
                'unavailable_dates' => $this->service->getFiztrenUnavailableDates($id),
                'unavailable_datetimes' => $this->service->getFiztrenUnavailableDateTimes($id)
            ]);
    }

    public function create(): RedirectResponse
    {
        $this->service->createFiztren();

        return redirect()
            ->back()
            ->with('success', __('Successfully created a new hall'));
    }

    public function destroy($id): RedirectResponse
    {
        $this->service->deleteFiztren($id);

        return redirect()
            ->route('admin.fiztren')
            ->with('success', __('Successfully deleted hall'));
    }

    public function createUnavailableDate(CreateFiztrenUnavailableDateRequest $request): RedirectResponse
    {

//        dd($request);
        $this->service->createFiztrenUnavailableDate($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully created new unavailable date'));
    }

    public function deleteUnavailableDate(DeleteFiztrenUnavailableDateRequest $request): RedirectResponse
    {
        $this->service->deleteFiztrenUnavailableDate($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully deleted unavailable date'));
    }

    public function createUnavailableDateTime(CreateFiztrenUnavailableDateTimeRequest $request): RedirectResponse
    {
        $this->service->createFiztrenUnavailableDateTime($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully created new unavailable date time'));
    }

    public function deleteUnavailableDateTime(DeleteFiztrenUnavailableDateTimeRequest $request): RedirectResponse
    {
        $this->service->deleteFiztrenUnavailableDateTime($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully deleted unavailable date time'));
    }
}
