<?php

namespace App\Services;

use App\Models\Fiztren;
use App\Models\FiztrenUnavailableDate;
use App\Models\FiztrenUnavailableDateTime;
use App\Models\Vyrtren;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

class FiztrenService implements FiztrenServiceInterface
{
    public function getFiztrens(): Collection|RedirectResponse
    {
        $Fiztrens = Fiztren::all();

        if ($Fiztrens->isEmpty()) {
            return redirect()
                ->route('admin.fiztren')
                ->with('error', __('Failed to get Fiztrens'));
        }

        return $Fiztrens;
    }

    public function createFiztren(array $validated, ?string $avatarPath): void
    {
        Fiztren::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'avatar' => $avatarPath ?? NULL,
            'reservation_type_id' => $validated['reservation_type_id'],
            'available' => $validated['available'] ?? true,
            'created_at' => now(),
        ]);
    }

    public function getFiztrenDetails(int $id): Fiztren|RedirectResponse
    {
        $Fiztren = Fiztren::find($id);

        if (empty($Fiztren)) {
            return redirect()
                ->route('admin.fiztren')
                ->with('error', __('Failed to get Fiztren by id'));
        }

        return $Fiztren;
    }

    public function updateFiztren(object $headCoach, array $validated, ?string $avatarPath): void
    {
        $headCoach->first_name = $validated['first_name'];
        $headCoach->last_name = $validated['last_name'];
        $avatarPath && $headCoach->avatar = $avatarPath;
        $headCoach->available = $validated['available'];
        $headCoach->updated_at = now();
        $headCoach->save();
    }

    public function deleteFiztren(object $psychicalCoach): int|RedirectResponse
    {
        if (empty($psychicalCoach)) {
            return redirect()
                ->route('fiztrens.index')
                ->with('error', __('Failed to find fiztren'));
        }

        $psychicalCoach->delete();

        return 0;
    }

    public function getFiztrenUnavailableDates(int $id): Collection
    {
        return FiztrenUnavailableDate::select(
            'id',
            'unavailable_date',
            'created_at',
            'updated_at'
        )
            ->where('fiztren_id', $id)
            ->get();
    }

    public function createFiztrenUnavailableDate(object $request): FiztrenUnavailableDate|RedirectResponse
    {
        $FiztrenUnavailableDate = FiztrenUnavailableDate::firstOrCreate([
            'fiztren_id' => $request->validated('fiztren_id'),
            'unavailable_date' => $request->validated('unavailable_date'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($FiztrenUnavailableDate->wasRecentlyCreated) {
            return $FiztrenUnavailableDate;
        }
        else {
            return redirect()
                ->route('admin.fiztren.show')
                ->with('error', __('Failed to create a unavailable new date'));
        }
    }

    public function deleteFiztrenUnavailableDate(object $request): int|RedirectResponse
    {
        $id = $request->validated('unavailable_date_id');
        $FiztrenUnavailableDate = FiztrenUnavailableDate::find($id);

        if (empty($FiztrenUnavailableDate)) {
            return redirect()
                ->back()
                ->with('error', __('Failed to get Fiztren unavailable date by id'));
        }

        $FiztrenUnavailableDate->delete();

        return 0;
    }

    public function getFiztrenUnavailableDateTimes(int $id): Collection
    {
        return FiztrenUnavailableDateTime::select(
            'id',
            'unavailable_datetime',
            'created_at',
            'updated_at'
        )
            ->where('fiztren_id', $id)
            ->get();
    }

    public function createFiztrenUnavailableDateTime(object $request): FiztrenUnavailableDateTime|RedirectResponse
    {
        $tableUnavailableDateTime = FiztrenUnavailableDateTime::firstOrCreate([
            'fiztren_id' => $request->validated('fiztren_id'),
            'unavailable_datetime' => $request->validated('unavailable_datetime'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($tableUnavailableDateTime->wasRecentlyCreated) {
            return $tableUnavailableDateTime;
        }
        else {
            return redirect()
                ->route('admin.fiztren.show')
                ->with('error', __('Failed to create a new unavailable date time'));
        }
    }

    public function deleteFiztrenUnavailableDateTime(object $request): int|RedirectResponse
    {
        $id = $request->validated('unavailable_datetime_id');
        $FiztrenUnavailableDate = FiztrenUnavailableDateTime::find($id);

        if (empty($FiztrenUnavailableDate)) {
            return redirect()
                ->back()
                ->with('error', __('Failed to get Fiztren unavailable date time by id'));
        }

        $FiztrenUnavailableDate->delete();

        return 0;
    }
}
