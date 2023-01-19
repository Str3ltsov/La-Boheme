<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class VyrtrenUnavailableDateTime extends Model
{
    use HasFactory;

    public $table = 'vyrtren_unavailable_date_times';

    protected $fillable = [
        'vyrtren_id',
        'unavailable_datetime',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'vyrtren_id' => 'integer',
        'unavailable_datetime' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'vyrtren_id' => 'required|integer',
        'unavailable_datetime' => 'required|date',
    ];

    public function vyrtren(): HasOne
    {
        return $this->hasOne(Vyrtren::class, 'id', 'vyrtren_id');
    }
}
