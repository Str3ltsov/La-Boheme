<?php

namespace App\Services;

use App\Models\Table;
use App\Models\TableUnavailableDate;
use App\Models\TableUnavailableDateTime;
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
    public function createTableUnavailableDate(object $request): TableUnavailableDate|RedirectResponse;
    public function deleteTableUnavailableDate(object $request): int|RedirectResponse;
    public function createTableUnavailableDateTime(object $request)
    : TableUnavailableDateTime|RedirectResponse;
    public function deleteTableUnavailableDateTime(object $request): int|RedirectResponse;
}
