<?php

namespace App\Services;

use App\Models\ReservationType;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ReservationService implements ReservationServiceInterface
{
    public function getReservationTypes(): Collection
    {
        return ReservationType::all();
    }
}
