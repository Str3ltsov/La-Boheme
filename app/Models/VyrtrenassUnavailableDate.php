<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class VyrtrenassUnavailableDate extends Model
{
    use HasFactory;

    public $table = 'vyrtrenass_unavailable_dates';

    protected $fillable = [
        'vyrtrenass_id',
        'unavailable_date',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'vyrtrenass_id' => 'integer',
        'unavailable_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'vyrtrenass_id' => 'required|integer',
        'unavailable_date' => 'required|date_format:Y-m-d'
    ];

    public function vyrtrenass(): HasOne
    {
        return $this->hasOne(Vyrtrenass::class, 'id', 'vyrtren_id');
    }
}
