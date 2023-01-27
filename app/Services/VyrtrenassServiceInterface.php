<?php

namespace App\Services;

use App\Models\Table;
use App\Models\VyrtrenassUnavailableDate;
use App\Models\VyrtrenassUnavailableDateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

interface TablesServiceInterface
{
    public function getTables(): Collection|RedirectResponse;
    public function createTable(): Table|RedirectResponse;
    public function getTableDetails(int $id): Table|RedirectResponse;
    public function deleteTable(int $id): int|RedirectResponse;
    public function getTableUnavailableDates(int $id): Collection|RedirectResponse;
    public function getTableUnavailableDateTimes(int $id): Collection|RedirectResponse;
    public function createTableUnavailableDate(object $request): VyrtrenassUnavailableDate|RedirectResponse;
    public function deleteTableUnavailableDate(object $request): int|RedirectResponse;
    public function createTableUnavailableDateTime(object $request)
    : VyrtrenassUnavailableDateTime|RedirectResponse;
    public function deleteTableUnavailableDateTime(object $request): int|RedirectResponse;
}
