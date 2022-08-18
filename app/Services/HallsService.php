<?php

namespace App\Services;

use App\Models\Hall;
use App\Models\HallUnavailableDate;
use App\Models\HallUnavailableDateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

class HallsService implements HallsServiceInterface
{
    public function getHalls(): Collection|RedirectResponse
    {
        $halls = Hall::all();

        if ($halls->isEmpty()) {
            return redirect()
                ->route('admin.halls')
                ->with('error', __('Failed to get halls'));
        }

        return $halls;
    }

    public function createHall(): Hall|RedirectResponse
    {
        $hall = Hall::create([
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($hall->wasRecentlyCreated) {
            return $hall;
        }
        else {
            return redirect()
                ->route('admin.halls')
                ->with('error', __('Failed to create a new hall'));
        }
    }

    public function getHallDetails(int $id): Hall|RedirectResponse
    {
        $hall = Hall::find($id);

        if (empty($hall)) {
            return redirect()
                ->route('admin.halls')
                ->with('error', __('Failed to get hall by id'));
        }

        return $hall;
    }

    public function deleteHall(int $id): int|RedirectResponse
    {
        $hall = Hall::find($id);

        if (empty($hall)) {
            return redirect()
                ->route('admin.halls.show')
                ->with('error', __('Failed to get hall by id'));
        }

        $hall->delete();

        return 0;
    }

    public function getHallUnavailableDates(int $id): Collection
    {
        return HallUnavailableDate::select(
            'id',
            'unavailable_date',
            'created_at',
            'updated_at'
        )
            ->where('hall_id', $id)
            ->get();
    }

    public function createHallUnavailableDate(object $request): HallUnavailableDate|RedirectResponse
    {
        $hallUnavailableDate = HallUnavailableDate::firstOrCreate([
            'hall_id' => $request->validated('hall_id'),
            'unavailable_date' => $request->validated('unavailable_date'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($hallUnavailableDate->wasRecentlyCreated) {
            return $hallUnavailableDate;
        }
        else {
            return redirect()
                ->route('admin.halls.show')
                ->with('error', __('Failed to create a unavailable new date'));
        }
    }

    public function deleteHallUnavailableDate(object $request): int|RedirectResponse
    {
        $id = $request->validated('unavailable_date_id');
        $hallUnavailableDate = HallUnavailableDate::find($id);

        if (empty($hallUnavailableDate)) {
            return redirect()
                ->back()
                ->with('error', __('Failed to get hall unavailable date by id'));
        }

        $hallUnavailableDate->delete();

        return 0;
    }

    public function getHallUnavailableDateTimes(int $id): Collection
    {
        return HallUnavailableDateTime::select(
            'id',
            'unavailable_datetime',
            'created_at',
            'updated_at'
        )
            ->where('hall_id', $id)
            ->get();
    }

    public function createHallUnavailableDateTime(object $request): HallUnavailableDateTime|RedirectResponse
    {
        $tableUnavailableDateTime = HallUnavailableDateTime::firstOrCreate([
            'hall_id' => $request->validated('hall_id'),
            'unavailable_datetime' => $request->validated('unavailable_datetime'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($tableUnavailableDateTime->wasRecentlyCreated) {
            return $tableUnavailableDateTime;
        }
        else {
            return redirect()
                ->route('admin.halls.show')
                ->with('error', __('Failed to create a new unavailable date time'));
        }
    }

    public function deleteHallUnavailableDateTime(object $request): int|RedirectResponse
    {
        $id = $request->validated('unavailable_datetime_id');
        $hallUnavailableDate = HallUnavailableDateTime::find($id);

        if (empty($hallUnavailableDate)) {
            return redirect()
                ->back()
                ->with('error', __('Failed to get hall unavailable date time by id'));
        }

        $hallUnavailableDate->delete();

        return 0;
    }
}
