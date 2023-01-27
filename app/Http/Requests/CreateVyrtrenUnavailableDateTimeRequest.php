<?php

namespace App\Http\Requests;

use App\Models\VyrtrenUnavailableDateTime;
use Illuminate\Foundation\Http\FormRequest;

class CreateVytrenUnavailableDateTimeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return VyrtrenUnavailableDateTime::$rules;
    }
}
