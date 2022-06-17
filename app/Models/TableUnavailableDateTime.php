<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TableUnavailableDateTime extends Model
{
    use HasFactory;

    public $table = 'table_unavailable_date_times';

    protected $fillable = [
        'table_id',
        'unavailable_datetime',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'table_id' => 'integer',
        'unavailable_datetime' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static array $rules = [
        'table_id' => 'required|integer',
        'unavailable_datetime' => 'required|date',
    ];

    public function table(): HasOne
    {
        return $this->hasOne(Table::class, 'id', 'table_id');
    }
}
