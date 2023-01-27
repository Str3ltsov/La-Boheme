<?php

namespace App\Services;


use App\Models\Vyrtren;
use App\Models\VyrtrenUnavailableDate;
use App\Models\VyrtrenUnavailableDateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

class VyrtrenService implements VyrtrenServiceInterface
{
    public function getVyrtrens(): Collection|RedirectResponse
    {
        $vyrtrens = Vyrtren::all();

        if ($vyrtrens->isEmpty()) {
            return redirect()
                ->route('admin.vyrtrens')
                ->with('error', __('Failed to get vyrtrens'));
        }

        return $vyrtrens;
    }

    public function createVyrtren(): Vyrtren|RedirectResponse
    {
        $vyrtren = Vyrtren::create([
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($vyrtren->wasRecentlyCreated) {
            return $vyrtren;
        }
        else {
            return redirect()
                ->route('admin.vyrtrens')
                ->with('error', __('Failed to create a new vyrtren'));
        }
    }

    public function getVyrtrenDetails(int $id): Vyrtren|RedirectResponse
    {
        $vyrtren = Vyrtren::find($id);

        if (empty($vyrtren)) {
            return redirect()
                ->route('admin.vyrtrens')
                ->with('error', __('Failed to get vyrtren by id'));
        }

        return $vyrtren;
    }

    public function deleteVyrtren(int $id): int|RedirectResponse
    {
        $vyrtren = Vyrtren::find($id);

        if (empty($vyrtren)) {
            return redirect()
                ->route('admin.vyrtren.show')
                ->with('error', __('Failed to get vyrtren by id'));
        }

        $vyrtren->delete();

        return 0;
    }

    public function getVyrtrenUnavailableDates(int $id): Collection
    {
        return VyrtrenUnavailableDate::select(
            'id',
            'unavailable_date',
            'created_at',
            'updated_at'
        )
            ->where('vyrtren_id', $id)
            ->get();
    }

    public function getVyrtrenUnavailableDateTimes(int $id): Collection
    {
        return VyrtrenUnavailableDateTime::select(
            'id',
            'unavailable_datetime',
            'created_at',
            'updated_at'
        )
            ->where('vyrtren_id', $id)
            ->get();
    }

//    public function createVyrtrenUnavailableDate(object $request): VyrtrenUnavailableDate|RedirectResponse;
    public function createVyrtrenUnavailableDate(object $request): VyrtrenUnavailableDate|RedirectResponse
    {


        $vyrtrenUnavailableDate = VyrtrenUnavailableDate::firstOrCreate([
            'vyrtren_id' => $request->validated('vyrtren_id'),
            'unavailable_date' => $request->validated('unavailable_date'),
            'created_at' => now(),
            'updated_at' => now()
        ]);



        if ($vyrtrenUnavailableDate->wasRecentlyCreated) {
            return $vyrtrenUnavailableDate;
        }
        else {
            return redirect()
                ->route('admin.vyrtrens.show')
                ->with('error', __('Failed to create a new date'));
        }
    }

    public function deleteVyrtrenUnavailableDate(object $request): int|RedirectResponse
    {
        $id = $request->validated('unavailable_date_id');
        $vyrtrenUnavailableDate = VyrtrenUnavailableDate::find($id);

        if (empty($vyrtrenUnavailableDate)) {
            return redirect()
                ->back()
                ->with('error', __('Failed to get vyrtren unavailable date by id'));
        }

        $vyrtrenUnavailableDate->delete();

        return 0;
    }

    public function createVyrtrenUnavailableDateTime(object $request)
    : VyrtrenUnavailableDateTime|RedirectResponse
    {
        $vyrtrenUnavailableDateTime = VyrtrenUnavailableDateTime::firstOrCreate([
            'vyrtren_id' => $request->validated('vyrtren_id'),
            'unavailable_datetime' => $request->validated('unavailable_datetime'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($vyrtrenUnavailableDateTime->wasRecentlyCreated) {
            return $vyrtrenUnavailableDateTime;
        }
        else {
            return redirect()
                ->route('admin.vyrtrens.show')
                ->with('error', __('Failed to create a new date time'));
        }
    }

    public function deleteVyrtrenUnavailableDateTime(object $request): int|RedirectResponse
    {
        $id = $request->validated('unavailable_datetime_id');
        $vyrtrenUnavailableDateTime = VyrtrenUnavailableDateTime::find($id);

        if (empty($vyrtrenUnavailableDateTime)) {
            return redirect()
                ->back()
                ->with('error', __('Failed to get vyrtren unavailable date time by id'));
        }

        $vyrtrenUnavailableDateTime->delete();

        return 0;
    }
}
