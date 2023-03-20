<?php

namespace App\Services;

use App\Models\Fiztren;
use App\Models\FiztrenUnavailableDate;
use App\Models\FiztrenUnavailableDateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

interface FiztrenServiceInterface
{
    public function getFiztrens(): Collection|RedirectResponse;
    public function createFiztren(array $validated, ?string $avatarPath): void;
    public function getFiztrenDetails(int $id): Fiztren|RedirectResponse;
    public function updateFiztren(object $headCoach, array $validated, ?string $avatarPath): void;
    public function deleteFiztren(int $id): int|RedirectResponse;
    public function getFiztrenUnavailableDates(int $id): Collection|RedirectResponse;
    public function createFiztrenUnavailableDate(object $request): FiztrenUnavailableDate|RedirectResponse;
    public function deleteFiztrenUnavailableDate(object $request): int|RedirectResponse;
    public function getFiztrenUnavailableDateTimes(int $id): Collection|RedirectResponse;
    public function createFiztrenUnavailableDateTime(object $request): FiztrenUnavailableDateTime|RedirectResponse;
    public function deleteFiztrenUnavailableDateTime(object $request): int|RedirectResponse;
}
