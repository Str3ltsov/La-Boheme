<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function question()
    {
        return $this->hasMany(ReservationQuestion::class, 'id', 'reservation_question_id');
    }

    public function reservation()
    {
        return $this->hasOne(Reservation::class, 'id', 'reservation_id');
    }
}
