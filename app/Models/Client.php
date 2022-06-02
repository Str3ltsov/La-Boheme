<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $table = 'clients';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'additional_information',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'phone_number' => 'string',
        'additional_information' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'name' => 'required',
        'email' => 'required|email:rfc',
        'phone_number' => 'required|numeric|digits:11'
    ];
}
