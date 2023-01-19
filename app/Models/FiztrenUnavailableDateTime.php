<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FiztrenUnavailableDateTime extends Model
{
    use HasFactory;

    public $table = 'fiztren_unavailable_date_times';

    protected $fillable = [
        'fiztren_id',
        'unavailable_datetime',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'fiztren_id' => 'integer',
        'unavailable_datetime' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'fiztren_id' => 'required|integer',
        'unavailable_datetime' => 'required|date',
    ];

    public function fiztren(): HasOne
    {
        return $this->hasOne(Fiztren::class, 'id', 'fiztren_id');
    }
}
