<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFiztrenUnavailableDateRequest;
use App\Http\Requests\CreateFiztrenUnavailableDateTimeRequest;
use App\Http\Requests\CreateVyrtrenRequest;
use App\Http\Requests\DeleteFiztrenUnavailableDateRequest;
use App\Http\Requests\DeleteFiztrenUnavailableDateTimeRequest;
use App\Http\Requests\UpdateVyrtrenRequest;
use App\Models\FiztrenUnavailableDate;
use App\Services\FiztrenService;
use App\Services\FiztrenServiceInterface;
use App\Traits\Selectors;
use App\Traits\UseDatesTimes;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;

class FiztrenController extends Controller
{
    use useDatesTimes, Selectors;

    private FiztrenService $service;

    public function __construct(FiztrenServiceInterface $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(): Factory|View|Application
    {
        return view('admin.fiztren.index')
            ->with('coaches', $this->service->getFiztrens());
    }

    public function show($id): Factory|View|Application
    {
        return view('admin.fiztren.show')
            ->with([
                'coach' => $this->service->getFiztrenDetails($id),
                'unavailable_dates' => $this->service->getFiztrenUnavailableDates($id),
                'unavailable_datetimes' => $this->service->getFiztrenUnavailableDateTimes($id)
            ]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.fiztren.create')
            ->with('availability', $this->availabilitySelector());
    }

    public function store(CreateVyrtrenRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $avatarPath = null;

            if ($validated['avatar']) {
                $avatarName = time().'.'.$validated['avatar']->getClientOriginalExtension();
                $validated['avatar']->move(public_path('/images/avatars'), $avatarName);
                $avatarPath = '/images/avatars/'.$avatarName;
            }

            $this->service->createFiztren($validated, $avatarPath);

            return redirect()
                ->route('fiztrens.index')
                ->with('success', __('Successfully created a new psychical training coach'));
        }
        catch (QueryException $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function edit($id): Factory|View|Application
    {
        return view('admin.fiztren.edit')
            ->with([
                'coach' => $this->service->getFiztrenDetails($id),
                'availability' => $this->availabilitySelector()
            ]);
    }

    public function update($id, UpdateVyrtrenRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $psychicalCoach = $this->service->getFiztrenDetails($id);
            $avatarPath = null;

            if (isset($validated['avatar'])) {
                File::delete(public_path($psychicalCoach->avatar));
                $avatarName = time().'.'.$validated['avatar']->getClientOriginalExtension();
                $validated['avatar']->move(public_path('/images/avatars'), $avatarName);
                $avatarPath = '/images/avatars/'.$avatarName;
            }

            $this->service->updateFiztren($psychicalCoach, $validated, $avatarPath);

            return redirect()
                ->route('fiztrens.index')
                ->with('success', __('Successfully updated psychical training coach'));
        }
        catch (QueryException $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function destroy($id): RedirectResponse
    {
        $psychicalCoach = $this->service->getFiztrenDetails($id);

        $this->service->deleteFiztren($psychicalCoach);

        File::delete(public_path($psychicalCoach->avatar));

        return redirect()
            ->route('fiztrens.index')
            ->with('success', __('Successfully deleted psychical training coach'));
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
