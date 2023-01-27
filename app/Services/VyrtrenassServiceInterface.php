<?php

namespace App\Services;

use App\Models\Table;
use App\Models\Vyrtrenass;
use App\Models\VyrtrenassUnavailableDate;
use App\Models\VyrtrenassUnavailableDateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

interface VyrtrenassServiceInterface
{
    public function getVyrtrens(): Collection|RedirectResponse;
    public function createVyrtrens(): Vyrtrenass|RedirectResponse;
    public function getVyrtrenassDetails(int $id): Vyrtrenass|RedirectResponse;
    public function deleteVyrtrenass(int $id): int|RedirectResponse;
    public function getVyrtrenassUnavailableDates(int $id): Collection|RedirectResponse;
    public function getVyrtrenassUnavailableDateTimes(int $id): Collection|RedirectResponse;
    public function createVyrtrenassUnavailableDate(object $request): VyrtrenassUnavailableDate|RedirectResponse;
    public function deleteVyrtrenassUnavailableDate(object $request): int|RedirectResponse;
    public function createVyrtrenassUnavailableDateTime(object $request)
    : VyrtrenassUnavailableDateTime|RedirectResponse;
    public function deleteVyrtrenassUnavailableDateTime(object $request): int|RedirectResponse;
}
