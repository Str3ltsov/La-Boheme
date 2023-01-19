<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FiztrenUnavailableDate extends Model
{
    use HasFactory;

    public $table = 'fiztren_unavailable_dates';

    protected $fillable = [
        'fiztren_id',
        'unavailable_date',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'fiztren_id' => 'integer',
        'unavailable_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'fiztren_id' => 'required|integer',
        'unavailable_date' => 'required|date_format:Y-m-d'
    ];

    public function fiztren(): HasOne
    {
        return $this->hasOne(Fiztren::class, 'id', 'fiztren_id');
    }
}
