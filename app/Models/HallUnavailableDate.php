<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallUnavailableDate extends Model
{
    use HasFactory;

    public $table = 'hall_unavailable_dates';

    protected $fillable = [
        'hall_id',
        'unavailable_date',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'hall_id' => 'integer',
        'unavailable_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'hall_id' => 'required|integer',
        'unavailable_date' => 'required|date_format:Y-m-d'
    ];

    public function hall()
    {
        return $this->hasOne(Hall::class, 'id', 'hall_id');
    }
}
