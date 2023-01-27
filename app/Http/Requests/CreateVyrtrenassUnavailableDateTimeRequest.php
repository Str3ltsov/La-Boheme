<?php

namespace App\Http\Requests;

use App\Models\VyrtrenUnavailableDateTime;
use Illuminate\Foundation\Http\FormRequest;

class CreateVytrenassUnavailableDateTimeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return VyrtrenassUnavailableDateTime::$rules;
    }
}
