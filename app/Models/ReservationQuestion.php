<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationQuestion extends Model
{
    use HasFactory;

    public $table = 'reservation_questions';

    public $timestamps = false;

    protected $fillable = [
        'question',
        'can_comment',
        'comment_placeholder',
        'reservation_type_id'
    ];

    protected $casts = [
        'name' => 'string',
        'can_comment' => 'boolean',
        'comment_placeholder' => 'string',
        'reservation_type_id' => 'integer'
    ];

    public static array $rules = [
        'name' => 'required',
        'can_comment' => 'required|boolean',
        'reservation_type_id' => 'required|integer'
    ];

    public function reservationType()
    {
        return $this->hasOne(ReservationType::class, 'reservation_type_id');
    }
}
