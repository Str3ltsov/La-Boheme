<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class VyrtrenUnavailableDate extends Model
{
    use HasFactory;

    public $table = 'vyrtren_unavailable_dates';

    protected $fillable = [
        'vyrtren_id',
        'unavailable_date',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'vyrtren_id' => 'integer',
        'unavailable_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'vyrtren_id' => 'required|integer',
        'unavailable_date' => 'required|date_format:Y-m-d'
    ];

    public function vyrtren(): HasOne
    {
        return $this->hasOne(Hall::class, 'id', 'vyrtren_id');
    }
}
