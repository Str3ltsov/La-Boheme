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

class HallsController extends Controller
{
    use useDatesTimes;

    private HallsService $service;

    public function __construct(HallsServiceInterface $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.halls.index')
            ->with('halls', $this->service->getHalls());
    }

    public function show($id)
    {
        return view('admin.halls.show')
            ->with([
                'hall' => $this->service->getHallDetails($id),
                'unavailable_dates' => $this->service->getHallUnavailableDates($id),
                'unavailable_datetimes' => $this->service->getHallUnavailableDateTimes($id)
            ]);
    }

    public function create()
    {
        $this->service->createHall();

        return redirect()
            ->back()
            ->with('success', 'Successfully created a new hall');
    }

    public function destroy($id)
    {
        $this->service->deleteHall($id);

        return redirect()
            ->route('admin.halls')
            ->with('success', "Successfully deleted hall $id");
    }

    public function createUnavailableDate(CreateHallUnavailableDateRequest $request)
    {
        $this->service->createHallUnavailableDate($request);

        return redirect()
            ->back()
            ->with('success', "Successfully created new date");
    }

    public function deleteUnavailableDate(DeleteHallUnavailableDateRequest $request)
    {
        $this->service->deleteHallUnavailableDate($request);

        return redirect()
            ->back()
            ->with('success', "Successfully deleted hall unavailable date");
    }

    public function createUnavailableDateTime(CreateHallUnavailableDateTimeRequest $request)
    {
        $this->service->createHallUnavailableDateTime($request);

        return redirect()
            ->back()
            ->with('success', "Successfully created new date time");
    }

    public function deleteUnavailableDateTime(DeleteHallUnavailableDateTimeRequest $request)
    {
        $this->service->deleteHallUnavailableDateTime($request);

        return redirect()
            ->back()
            ->with('success', "Successfully deleted hall unavailable date time");
    }
}