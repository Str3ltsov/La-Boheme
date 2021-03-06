<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;

    public $table = 'employees';

    protected $fillable = [
        'name',
        'avatar',
        'available',
        'rating',
        'employee_type_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'name' => 'string',
        'avatar' => 'string',
        'available' => 'boolean',
        'rating' => 'double',
        'employee_type_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'name' => 'required',
        'available' => 'required|boolean',
        'employee_type_id' => 'required|integer'
    ];

    public function type(): HasOne
    {
        return $this->hasOne(EmployeeType::class, 'id', 'employee_type_id');
    }
}
