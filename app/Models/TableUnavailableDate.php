<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableUnavailableDate extends Model
{
    use HasFactory;

    public $table = 'table_unavailable_dates';

    protected $fillable = [
        'table_id',
        'unavailable_date',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'table_id' => 'integer',
        'unavailable_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'table_id' => 'required|integer',
        'unavailable_date' => 'required|date_format:Y-m-d'
    ];

    public function table()
    {
        return $this->hasOne(Table::class, 'id', 'table_id');
    }
}
