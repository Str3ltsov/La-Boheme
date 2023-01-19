<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vyrtren extends Model
{
    use HasFactory;

    public $table = 'vytren';

    protected $fillable = [
        'available',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'available' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'available' => 'required|boolean'
    ];
}
