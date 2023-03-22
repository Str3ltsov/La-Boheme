<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vyrtren extends Model
{
    use HasFactory;

    public $table = 'vyrtren';

    protected $fillable = [
        'first_name',
        'last_name',
        'avatar',
        'available',
        'cv',
        'reservation_type_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'avatar' => 'string',
        'cv' => 'string',
        'available' => 'boolean',
        'reservation_type_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'avatar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        'cv' => 'nullable|mimes:pdf',
        'reservation_type_id' => 'required|integer',
        'available' => 'required|boolean'
    ];
}
