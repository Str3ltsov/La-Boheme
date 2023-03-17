<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Model
{
    use HasFactory;

    public $table = 'reservations';

    protected $fillable = [
//        'start_datetime',
//        'end_datetime',
//        'number_of_people',
        'rating',
        'reservation_type_id',
        "fiztren_id",
         "vyrtren_id",
         "vyrtrenass_id",
        'client_id',
        'reservation_status_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
//        'start_datetime' => 'datetime',
//        'end_datetime' => 'datetime',
//        'number_of_people' => 'integer',
        'rating' => 'double',
        'reservation_type_id' => 'integer',
        "fiztren_id",
        "vyrtren_id",
        "vyrtrenass",
        'client_id' => 'integer',
        'reservation_status_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
//        'start_datetime' => 'required|date',
//        'start_datetime' => 'required|date|before:end_datetime',
//        'end_datetime' => 'required|date|after:start_datetime',
        'number_of_people' => 'required|integer',
        'rating' => 'nullable|numeric',
        'reservation_type_id' => 'required|integer',
        "fiztren_id",
        "vyrtren_id",
        "vyrtrenass_id",
        'client_id' => 'required|integer',
        'reservation_status_id' => 'required|integer',
    ];

    public function type(): HasOne
    {
        return $this->hasOne(ReservationType::class, 'id', 'reservation_type_id');
    }

    public function vyrtren(): HasOne
    {
        return $this->hasOne(Vyrtren::class, 'id', 'vyrtren_id');
    }

    public function vyrtrenass(): HasOne
    {
        return $this->hasOne(Vyrtrenass::class, 'id', 'vyrtrenass_id');
    }
    public function fiztren(): HasOne
    {
        return $this->hasOne(Fiztren::class, 'id', 'fiztren_id');
    }
    public function client(): HasOne
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function status(): HasOne
    {
        return $this->hasOne(ReservationStatus::class, 'id', 'reservation_status_id');
    }
}
