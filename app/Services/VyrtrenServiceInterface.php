<?php

namespace App\Services;


use App\Models\Vyrtren;
use App\Models\VyrtrenUnavailableDate;
use App\Models\VyrtrenUnavailableDateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

interface VyrtrenServiceInterface
{
    public function getVyrtrens(): Collection;
    public function createVyrtren(array $validated, ?string $avatarPath, ?string $cvPath): void;
    public function getVyrtrenDetails(int $id): Vyrtren|RedirectResponse;
    public function updateVyrtren(object $headCoach, array $validated, ?string $avatarPath, ?string $cvPath): void;
    public function deleteVyrtren(object $headCoach): int|RedirectResponse;
    public function getVyrtrenUnavailableDates(int $id): Collection|RedirectResponse;
    public function getVyrtrenUnavailableDateTimes(int $id): Collection|RedirectResponse;
    public function createVyrtrenUnavailableDate(object $request): VyrtrenUnavailableDate|RedirectResponse;
    public function deleteVyrtrenUnavailableDate(object $request): int|RedirectResponse;
    public function createVyrtrenUnavailableDateTime(object $request)
    : VyrtrenUnavailableDateTime|RedirectResponse;
    public function deleteVyrtrenUnavailableDateTime(object $request): int|RedirectResponse;
}
