<?php

namespace App\Services;

use App\Models\Hall;
use App\Models\HallUnavailableDate;
use App\Models\HallUnavailableDateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

interface HallsServiceInterface
{
    public function getHalls(): Collection|RedirectResponse;
    public function createHall(): Hall|RedirectResponse;
    public function getHallDetails(int $id): Hall|RedirectResponse;
    public function deleteHall(int $id): int|RedirectResponse;
    public function getHallUnavailableDates(int $id): Collection|RedirectResponse;
    public function createHallUnavailableDate(object $request): HallUnavailableDate|RedirectResponse;
    public function deleteHallUnavailableDate(object $request): int|RedirectResponse;
    public function getHallUnavailableDateTimes(int $id): Collection|RedirectResponse;
    public function createHallUnavailableDateTime(object $request): HallUnavailableDateTime|RedirectResponse;
    public function deleteHallUnavailableDateTime(object $request): int|RedirectResponse;
}
