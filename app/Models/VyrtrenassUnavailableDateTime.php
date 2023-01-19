<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class VyrtrenassUnavailableDateTime extends Model
{
    use HasFactory;

    public $table = 'vyrtrenass_unavailable_date_times';

    protected $fillable = [
        'vyrtrenass_id',
        'unavailable_datetime',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'vyrtrenass_id' => 'integer',
        'unavailable_datetime' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'vyrtrenass_id' => 'required|integer',
        'unavailable_datetime' => 'required|date',
    ];

    public function vyrtrenass(): HasOne
    {
        return $this->hasOne(Vyrtrenass::class, 'id', 'vyrtrenass_id');
    }
}
