<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public $table = 'reservations';

    protected $fillable = [
        'date_and_time',
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
        'date_and_time' => 'datetime',
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
        'datetime' => 'required|date|before:date',
        'number_of_people' => 'required|integer',
        'rating' => 'nullable|numeric',
        'reservation_type_id' => 'required|integer',
        'table_id' => 'nullable|integer',
        'hall_id' => 'nullable|integer',
        'client_id' => 'required|integer',
        'reservation_status_id' => 'required|integer',
    ];

    public function reservationType()
    {
        return $this->hasOne(ReservationType::class, 'reservation_type_id');
    }

    public function table()
    {
        return $this->hasOne(Table::class, 'table_id');
    }

    public function hall()
    {
        return $this->hasOne(Hall::class, 'hall_id');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'client_id');
    }

    public function reservationStatus()
    {
        return $this->hasOne(ReservationStatus::class, 'reservation_status_id');
    }
}
