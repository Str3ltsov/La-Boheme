<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\UseDatesTimes;
use Exception;

use Illuminate\Http\JsonResponse;

class ReservationFormApiController extends Controller
{
    use UseDatesTimes;

    /*
     * Getting unavailable dates by reservation type
     */
    public function show($id): JsonResponse
    {
        try {
            $unavailableDates = $this->getUnavailableDatesByReservationType($id);
            $newUnavailableDates = $this->getUnavailableDates($unavailableDates);

            return response()
                ->json($newUnavailableDates)
                ->header('Content-Type', 'text/plain');
        }
        catch (Exception $exception) {
            return response()
                ->json([
                    'status' => response()->status(),
                    'message' => $exception->getMessage()
                ])
                ->header('Content-Type', 'text/plain');
        }
    }
}
