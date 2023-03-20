<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateVyrtrenassUnavailableDateRequest;
use App\Http\Requests\CreateVyrtrenassUnavailableDateTimeRequest;
use App\Http\Requests\CreateVyrtrenRequest;
use App\Http\Requests\DeleteVyrtrenassUnavailableDateRequest;
use App\Http\Requests\DeleteVyrtrenassUnavailableDateTimeRequest;
use App\Http\Requests\UpdateVyrtrenRequest;
use App\Services\VyrtrenassService;
use App\Services\VyrtrenassServiceInterface;
use App\Traits\Selectors;
use App\Traits\UseDatesTimes;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;

class VyrtrenassController extends Controller
{
    use useDatesTimes, Selectors;

    private VyrtrenassService $service;

    public function __construct(VyrtrenassServiceInterface $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(): Factory|View|Application
    {
        return view('admin.vyrtrenass.index')
            ->with('assistants', $this->service->getVyrtrens());
    }

    public function show($id): Factory|View|Application
    {
        return view('admin.vyrtrenass.show')
            ->with([
                'assistant' => $this->service->getVyrtrenassDetails($id),
                'unavailable_dates' => $this->service->getVyrtrenassUnavailableDates($id),
                'unavailable_datetimes' => $this->service->getVyrtrenassUnavailableDateTimes($id)
            ]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.vyrtrenass.create')
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

            $this->service->createVyrtrenass($validated, $avatarPath);

            return redirect()
                ->route('vyrtrenasss.index')
                ->with('success', __('Successfully created a new head coach assistant'));
        }
        catch (QueryException $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function edit($id): Factory|View|Application
    {
        return view('admin.vyrtrenass.edit')
            ->with([
                'assistant' => $this->service->getVyrtrenassDetails($id),
                'availability' => $this->availabilitySelector()
            ]);
    }

    public function update($id, UpdateVyrtrenRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $headCoach = $this->service->getVyrtrenassDetails($id);
            $avatarPath = null;

            if (isset($validated['avatar'])) {
                File::delete(public_path($headCoach->avatar));
                $avatarName = time().'.'.$validated['avatar']->getClientOriginalExtension();
                $validated['avatar']->move(public_path('/images/avatars'), $avatarName);
                $avatarPath = '/images/avatars/'.$avatarName;
            }

            $this->service->updateVyrtrenass($headCoach, $validated, $avatarPath);

            return redirect()
                ->route('vyrtrenasss.index')
                ->with('success', __('Successfully updated head coach assistant'));
        }
        catch (QueryException $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function destroy($id): RedirectResponse
    {
        $assistant = $this->service->getVyrtrenassDetails($id);

        $this->service->deleteVyrtrenass($assistant);

        File::delete(public_path($assistant->avatar));

        return redirect()
            ->route('vyrtrenasss.index')
            ->with('success', __('Successfully deleted head coach assistant'));
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
