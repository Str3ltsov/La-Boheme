<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ReservationQuestion extends Model
{
    use HasFactory;

    public $table = 'reservation_questions';

    public $timestamps = false;

    protected $fillable = [
        'question',
        'reservation_type_id'
    ];

    protected $casts = [
        'name' => 'string',
        'reservation_type_id' => 'integer'
    ];

    public static array $rules = [
        'name' => 'required',
        'reservation_type_id' => 'required|integer'
    ];

    public function type(): HasOne
    {
        return $this->hasOne(ReservationType::class, 'id', 'reservation_type_id');
    }
}
