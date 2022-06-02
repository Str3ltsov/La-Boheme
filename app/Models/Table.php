<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    public $table = 'tables';

    protected $fillable = [
        'reservation_type_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'reservation_type_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'reservation_type_id' => 'required|integer'
    ];

    public function reservationType()
    {
        return $this->hasOne(ReservationType::class, 'reservation_type_id');
    }
}
