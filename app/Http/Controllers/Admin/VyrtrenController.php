<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateVyrTrenRequest;
use App\Http\Requests\CreateVyrtrenUnavailableDateRequest;
use App\Http\Requests\CreateVyrtrenUnavailableDateTimeRequest;
use App\Http\Requests\DeleteVyrtrenUnavailableDateRequest;
use App\Http\Requests\DeleteVyrtrenUnavailableDateTimeRequest;
use App\Http\Requests\UpdateVyrtrenRequest;
use App\Models\Vyrtren;
use App\Services\VyrtrenassService;
use App\Services\VyrtrenService;
use App\Services\VyrtrenServiceInterface;
use App\Traits\Selectors;
use App\Traits\UseDatesTimes;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;

class VyrtrenController extends Controller
{
    use useDatesTimes, Selectors;

    private VyrtrenService $service;

    public function __construct(VyrtrenServiceInterface $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(): Factory|View|Application
    {
        return view('admin.vyrtrens.index')
            ->with('coaches', $this->service->getVyrtrens());
    }

    public function show($id): Factory|View|Application
    {
        return view('admin.vyrtrens.show')
            ->with([
                'coach' => $this->service->getVyrtrenDetails($id),
                'unavailable_dates' => $this->service->getVyrtrenUnavailableDates($id),
                'unavailable_datetimes' => $this->service->getVyrtrenUnavailableDateTimes($id)
            ]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.vyrtrens.create')
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

            $this->service->createVyrtren($validated, $avatarPath);

            return redirect()
                ->route('vyrtrens.index')
                ->with('success', __('Successfully created a new head coach'));
        }
        catch (QueryException $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function edit($id): Factory|View|Application
    {
        return view('admin.vyrtrens.edit')
            ->with([
                'coach' => $this->service->getVyrtrenDetails($id),
                'availability' => $this->availabilitySelector()
            ]);
    }

    public function update($id, UpdateVyrtrenRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $headCoach = $this->service->getVyrtrenDetails($id);
            $avatarPath = null;

            if (isset($validated['avatar'])) {
                File::delete(public_path($headCoach->avatar));
                $avatarName = time().'.'.$validated['avatar']->getClientOriginalExtension();
                $validated['avatar']->move(public_path('/images/avatars'), $avatarName);
                $avatarPath = '/images/avatars/'.$avatarName;
            }

            $this->service->updateVyrtren($headCoach, $validated, $avatarPath);

            return redirect()
                ->route('vyrtrens.index')
                ->with('success', __('Successfully updated head coach'));
        }
        catch (QueryException $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function destroy($id): RedirectResponse
    {
        $this->service->deleteVyrtren($id);

        return redirect()
            ->route('vyrtrens.index')
            ->with('success', __('Successfully deleted head coach'));
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
