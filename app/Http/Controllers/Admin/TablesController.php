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
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class TablesController extends Controller
{
    use useDatesTimes;

    private TablesService $service;

    public function __construct(TablesServiceInterface $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(): Factory|View|Application
    {
        return view('admin.tables.index')
            ->with('tables', $this->service->getTables());
    }

    public function show($id): Factory|View|Application
    {
        return view('admin.tables.show')
            ->with([
                'table' => $this->service->getTableDetails($id),
                'unavailable_dates' => $this->service->getTableUnavailableDates($id),
                'unavailable_datetimes' => $this->service->getTableUnavailableDateTimes($id)
            ]);
    }

    public function create(): RedirectResponse
    {
        $this->service->createTable();

        return redirect()
            ->back()
            ->with('success', __('Successfully created a new table'));
    }

    public function destroy($id): RedirectResponse
    {
        $this->service->deleteTable($id);

        return redirect()
            ->route('admin.tables')
            ->with('success', __('Successfully deleted table'));
    }

    public function createUnavailableDate(CreateTableUnavailableDateRequest $request): RedirectResponse
    {
        $this->service->createTableUnavailableDate($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully created a new unavailable date'));
    }

    public function deleteUnavailableDate(DeleteTableUnavailableDateRequest $request): RedirectResponse
    {
        $this->service->deleteTableUnavailableDate($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully deleted unavailable date'));
    }

    public function createUnavailableDateTime(CreateTableUnavailableDateTimeRequest $request): RedirectResponse
    {
        $this->service->createTableUnavailableDateTime($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully created new unavailable date time'));
    }

    public function deleteUnavailableDateTime(DeleteTableUnavailableDateTimeRequest $request): RedirectResponse
    {
        $this->service->deleteTableUnavailableDateTime($request);

        return redirect()
            ->back()
            ->with('success', __('Successfully deleted unavailable date time'));
    }
}
