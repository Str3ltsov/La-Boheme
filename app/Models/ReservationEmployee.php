<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReservationEmployee extends Model
{
    use HasFactory;

    public $table = 'reservation_employees';

    protected $fillable = [
        'reservation_id',
        'employee_id',
        'rating',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'reservation_id' => 'integer',
        'employee_id' => 'integer',
        'rating' => 'double',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'reservation_id' => 'required|integer',
        'employee_id' => 'required|integer'
    ];

    public function reservation(): HasOne
    {
        return $this->hasOne(Reservation::class, 'id', 'reservation_id');
    }

    public function employee(): HasMany
    {
        return $this->hasMany(Employee::class, 'id', 'employee_id');
    }
}
