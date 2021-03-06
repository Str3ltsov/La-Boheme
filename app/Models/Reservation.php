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
        'start_datetime',
        'end_datetime',
        'number_of_people',
        'rating',
        'reservation_type_id',
        'table_id',
        'hall_id',
        'client_id',
        'reservation_status_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime',
        'number_of_people' => 'integer',
        'rating' => 'double',
        'reservation_type_id' => 'integer',
        'table_id' => 'integer',
        'hall_id' => 'integer',
        'client_id' => 'integer',
        'reservation_status_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'start_datetime' => 'required|date|before:end_datetime',
        'end_datetime' => 'required|date|after:start_datetime',
        'number_of_people' => 'required|integer',
        'rating' => 'nullable|numeric',
        'reservation_type_id' => 'required|integer',
        'table_id' => 'nullable|integer',
        'hall_id' => 'nullable|integer',
        'client_id' => 'required|integer',
        'reservation_status_id' => 'required|integer',
    ];

    public function type(): HasOne
    {
        return $this->hasOne(ReservationType::class, 'id', 'reservation_type_id');
    }

    public function table(): HasOne
    {
        return $this->hasOne(Table::class, 'id', 'table_id');
    }

    public function hall(): HasOne
    {
        return $this->hasOne(Hall::class, 'id', 'hall_id');
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
