<?php

namespace App\Services;

use App\Models\Table;
use App\Models\VyrtrenassUnavailableDate;
use App\Models\VyrtrenassUnavailableDateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

class VyrtrenService implements TablesServiceInterface
{
    public function getTables(): Collection|RedirectResponse
    {
        $tables = Table::all();

        if ($tables->isEmpty()) {
            return redirect()
                ->route('admin.tables')
                ->with('error', __('Failed to get tables'));
        }

        return $tables;
    }

    public function createTable(): Table|RedirectResponse
    {
        $table = Table::create([
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($table->wasRecentlyCreated) {
            return $table;
        }
        else {
            return redirect()
                ->route('admin.tables')
                ->with('error', __('Failed to create a new table'));
        }
    }

    public function getTableDetails(int $id): Table|RedirectResponse
    {
        $table = Table::find($id);

        if (empty($table)) {
            return redirect()
                ->route('admin.tables')
                ->with('error', __('Failed to get table by id'));
        }

        return $table;
    }

    public function deleteTable(int $id): int|RedirectResponse
    {
        $table = Table::find($id);

        if (empty($table)) {
            return redirect()
                ->route('admin.tables.show')
                ->with('error', __('Failed to get table by id'));
        }

        $table->delete();

        return 0;
    }

    public function getTableUnavailableDates(int $id): Collection
    {
        return VyrtrenassUnavailableDate::select(
            'id',
            'unavailable_date',
            'created_at',
            'updated_at'
        )
            ->where('table_id', $id)
            ->get();
    }

    public function getTableUnavailableDateTimes(int $id): Collection
    {
        return VyrtrenassUnavailableDateTime::select(
            'id',
            'unavailable_datetime',
            'created_at',
            'updated_at'
        )
            ->where('table_id', $id)
            ->get();
    }

    public function createTableUnavailableDate(object $request): VyrtrenassUnavailableDate|RedirectResponse
    {
        $tableUnavailableDate = VyrtrenassUnavailableDate::firstOrCreate([
            'table_id' => $request->validated('table_id'),
            'unavailable_date' => $request->validated('unavailable_date'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($tableUnavailableDate->wasRecentlyCreated) {
            return $tableUnavailableDate;
        }
        else {
            return redirect()
                ->route('admin.tables.show')
                ->with('error', __('Failed to create a new date'));
        }
    }

    public function deleteTableUnavailableDate(object $request): int|RedirectResponse
    {
        $id = $request->validated('unavailable_date_id');
        $tableUnavailableDate = VyrtrenassUnavailableDate::find($id);

        if (empty($tableUnavailableDate)) {
            return redirect()
                ->back()
                ->with('error', __('Failed to get table unavailable date by id'));
        }

        $tableUnavailableDate->delete();

        return 0;
    }

    public function createTableUnavailableDateTime(object $request)
    : VyrtrenassUnavailableDateTime|RedirectResponse
    {
        $tableUnavailableDateTime = VyrtrenassUnavailableDateTime::firstOrCreate([
            'table_id' => $request->validated('table_id'),
            'unavailable_datetime' => $request->validated('unavailable_datetime'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($tableUnavailableDateTime->wasRecentlyCreated) {
            return $tableUnavailableDateTime;
        }
        else {
            return redirect()
                ->route('admin.tables.show')
                ->with('error', __('Failed to create a new date time'));
        }
    }

    public function deleteTableUnavailableDateTime(object $request): int|RedirectResponse
    {
        $id = $request->validated('unavailable_datetime_id');
        $tableUnavailableDateTime = VyrtrenassUnavailableDateTime::find($id);

        if (empty($tableUnavailableDateTime)) {
            return redirect()
                ->back()
                ->with('error', __('Failed to get table unavailable date time by id'));
        }

        $tableUnavailableDateTime->delete();

        return 0;
    }
}
