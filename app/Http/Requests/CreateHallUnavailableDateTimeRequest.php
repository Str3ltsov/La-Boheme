<?php

namespace App\Http\Requests;

use App\Models\HallUnavailableDateTime;
use Illuminate\Foundation\Http\FormRequest;

class CreateHallUnavailableDateTimeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return HallUnavailableDateTime::$rules;
    }
}
