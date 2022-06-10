<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeType extends Model
{
    use HasFactory;

    public $table = 'employee_types';

    public $timestamps = false;

    protected $fillable = ['name'];

    protected $casts = ['name' => 'string'];

    public static array $rules = ['name' => 'required',];
}
