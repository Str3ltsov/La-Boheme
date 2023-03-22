<?php

namespace App\Services;


use App\Models\Vyrtren;
use App\Models\Vyrtrenass;
use App\Models\VyrtrenassUnavailableDate;
use App\Models\VyrtrenassUnavailableDateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

class VyrtrenassService implements VyrtrenassServiceInterface
{
    public function getVyrtrens(): Collection
    {
        return Vyrtrenass::all();
    }

    public function createVyrtrenass(array $validated, ?string $avatarPath, ?string $cvPath): void
    {
        Vyrtrenass::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'avatar' => $avatarPath ?? NULL,
            'cv' => $cvPath ?? NULL,
            'reservation_type_id' => $validated['reservation_type_id'],
            'available' => $validated['available'] ?? true,
            'created_at' => now(),
        ]);
    }

    public function getVyrtrenassDetails(int $id): Vyrtrenass|RedirectResponse
    {
        $vyrtrenass = Vyrtrenass::find($id);

        if (empty($vyrtrenass)) {
            return redirect()
                ->route('admin.vyrtrenasss')
                ->with('error', __('Failed to get vyrtrenass by id'));
        }

        return $vyrtrenass;
    }

    public function updateVyrtrenass(object $assistantCoach, array $validated, ?string $avatarPath, ?string $cvPath): void
    {
        $assistantCoach->first_name = $validated['first_name'];
        $assistantCoach->last_name = $validated['last_name'];
        $avatarPath && $assistantCoach->avatar = $avatarPath;
        $cvPath && $assistantCoach->avatar = $cvPath;
        $assistantCoach->available = $validated['available'];
        $assistantCoach->updated_at = now();
        $assistantCoach->save();
    }

    public function deleteVyrtrenass(object $assistant): int|RedirectResponse
    {
        if (empty($assistant)) {
            return redirect()
                ->route('vyrtrenass.index')
                ->with('error', __('Failed to find vyrtrenass'));
        }

        $assistant->delete();

        return 0;
    }

    public function getVyrtrenassUnavailableDates(int $id): Collection
    {
        return VyrtrenassUnavailableDate::select(
            'id',
            'unavailable_date',
            'created_at',
            'updated_at'
        )
            ->where('vyrtrenass_id', $id)
            ->get();
    }

    public function getVyrtrenassUnavailableDateTimes(int $id): Collection
    {
        return VyrtrenassUnavailableDateTime::select(
            'id',
            'unavailable_datetime',
            'created_at',
            'updated_at'
        )
            ->where('vyrtrenass_id', $id)
            ->get();
    }

    public function createVyrtrenassUnavailableDate(object $request): VyrtrenassUnavailableDate|RedirectResponse
    {
        $vyrtrenassUnavailableDate = VyrtrenassUnavailableDate::firstOrCreate([
            'vyrtrenass_id' => $request->validated('vyrtrenass_id'),
            'unavailable_date' => $request->validated('unavailable_date'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($vyrtrenassUnavailableDate->wasRecentlyCreated) {
            return $vyrtrenassUnavailableDate;
        }
        else {
            return redirect()
                ->route('admin.vyrtrenasss.show')
                ->with('error', __('Failed to create a new date'));
        }
    }

    public function deleteVyrtrenassUnavailableDate(object $request): int|RedirectResponse
    {
        $id = $request->validated('unavailable_date_id');
        $vyrtrenassUnavailableDate = VyrtrenassUnavailableDate::find($id);

        if (empty($vyrtrenassUnavailableDate)) {
            return redirect()
                ->back()
                ->with('error', __('Failed to get vyrtrenass unavailable date by id'));
        }

        $vyrtrenassUnavailableDate->delete();

        return 0;
    }

    public function createVyrtrenassUnavailableDateTime(object $request)
    : VyrtrenassUnavailableDateTime|RedirectResponse
    {
        $vyrtrenassUnavailableDateTime = VyrtrenassUnavailableDateTime::firstOrCreate([
            'vyrtrenass_id' => $request->validated('vyrtrenass_id'),
            'unavailable_datetime' => $request->validated('unavailable_datetime'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($vyrtrenassUnavailableDateTime->wasRecentlyCreated) {
            return $vyrtrenassUnavailableDateTime;
        }
        else {
            return redirect()
                ->route('admin.vyrtrenasss.show')
                ->with('error', __('Failed to create a new date time'));
        }
    }

    public function deleteVyrtrenassUnavailableDateTime(object $request): int|RedirectResponse
    {
        $id = $request->validated('unavailable_datetime_id');
        $vyrtrenassUnavailableDateTime = VyrtrenassUnavailableDateTime::find($id);

        if (empty($vyrtrenassUnavailableDateTime)) {
            return redirect()
                ->back()
                ->with('error', __('Failed to get vyrtrenass unavailable date time by id'));
        }

        $vyrtrenassUnavailableDateTime->delete();

        return 0;
    }
}
