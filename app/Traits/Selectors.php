<?php

namespace App\Traits;

use App\Helpers\Constants;

trait Selectors
{
    public function reservationTypeSelector(): array
    {
        return [
            Constants::reservationTypeVyrtren => __('Head coach'),
            Constants::reservationTypeVyrtrenass => __('Head coach assistant'),
            Constants::reservationTypeFiztren => __('Physical training coach')
        ];
    }

    public function availabilitySelector(): array
    {
        return [
            0 => __('Unavailable'),
            1 => __('Available')
        ];
    }
}
