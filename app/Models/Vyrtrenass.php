<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vyrtrenass extends Model
{
    use HasFactory;

    public $table = 'vyrtrenass';

    protected $fillable = [
        'first_name',
        'last_name',
        'avatar',
        'available',
        'reservation_type_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'avatar' => 'string',
        'available' => 'boolean',
        'reservation_type_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'avatar' => 'nullable|string',
        'reservation_type_id' => 'required|integer',
        'available' => 'required|boolean'
    ];
}
