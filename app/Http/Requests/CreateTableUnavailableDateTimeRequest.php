<?php

namespace App\Http\Requests;

use App\Models\TableUnavailableDateTime;
use Illuminate\Foundation\Http\FormRequest;

class CreateTableUnavailableDateTimeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return TableUnavailableDateTime::$rules;
    }
}
