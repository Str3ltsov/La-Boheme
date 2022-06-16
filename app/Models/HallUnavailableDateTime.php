<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallUnavailableDateTime extends Model
{
    use HasFactory;

    public $table = 'hall_unavailable_date_times';

    protected $fillable = [
        'hall_id',
        'unavailable_datetime',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'hall_id' => 'integer',
        'unavailable_datetime' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'hall_id' => 'required|integer',
        'unavailable_datetime' => 'required|date',
    ];

    public function hall()
    {
        return $this->hasOne(Hall::class, 'id', 'hall_id');
    }
}
