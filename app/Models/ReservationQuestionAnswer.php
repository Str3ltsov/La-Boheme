<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ReservationQuestionAnswer extends Model
{
    use HasFactory;

    public $table = 'reservation_question_answers';

    protected $fillable = [
        'reservation_question_id',
        'reservation_id',
        'answer',
        'comment'
    ];

    protected $casts = [
        'reservation_question_id' => 'integer',
        'reservation_id' => 'integer',
        'answer' => 'boolean',
        'comment' => 'string'
    ];

    public static array $rules = [
        'reservation_question_id' => 'required|integer',
        'reservation_id' => 'required|integer',
        'answer' => 'required|boolean'
    ];

    public function question(): HasOne
    {
        return $this->hasOne(ReservationQuestion::class, 'id', 'reservation_question_id');
    }

    public function reservation(): HasOne
    {
        return $this->hasOne(Reservation::class, 'id', 'reservation_id');
    }
}
