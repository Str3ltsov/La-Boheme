<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTableUnavailableDateRequest;
use App\Http\Requests\CreateTableUnavailableDateTimeRequest;
use App\Http\Requests\DeleteTableUnavailableDateRequest;
use App\Http\Requests\DeleteTableUnavailableDateTimeRequest;
use App\Services\TablesService;
use App\Services\TablesServiceInterface;
use App\Traits\UseDatesTimes;

class TablesController extends Controller
{
    use useDatesTimes;

    private TablesService $service;

    public function __construct(TablesServiceInterface $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.tables.index')
            ->with('tables', $this->service->getTables());
    }

    public function show($id)
    {
        return view('admin.tables.show')
            ->with([
                'table' => $this->service->getTableDetails($id),
                'unavailable_dates' => $this->service->getTableUnavailableDates($id),
                'unavailable_datetimes' => $this->service->getTableUnavailableDateTimes($id)
            ]);
    }

    public function create()
    {
        $this->service->createTable();

        return redirect()
            ->back()
            ->with('success', 'Successfully created a new table');
    }

    public function destroy($id)
    {
        $this->service->deleteTable($id);

        return redirect()
            ->route('admin.tables')
            ->with('success', "Successfully deleted table $id");
    }

    public function createUnavailableDate(CreateTableUnavailableDateRequest $request)
    {
        $this->service->createTableUnavailableDate($request);

        return redirect()
            ->back()
            ->with('success', "Successfully created new date");
    }

    public function deleteUnavailableDate(DeleteTableUnavailableDateRequest $request)
    {
        $this->service->deleteTableUnavailableDate($request);

        return redirect()
            ->back()
            ->with('success', "Successfully deleted table unavailable date");
    }

    public function createUnavailableDateTime(CreateTableUnavailableDateTimeRequest $request)
    {
        $this->service->createTableUnavailableDateTime($request);

        return redirect()
            ->back()
            ->with('success', "Successfully created new date time");
    }

    public function deleteUnavailableDateTime(DeleteTableUnavailableDateTimeRequest $request)
    {
        $this->service->deleteTableUnavailableDateTime($request);

        return redirect()
            ->back()
            ->with('success', "Successfully deleted table unavailable date time");
    }
}
