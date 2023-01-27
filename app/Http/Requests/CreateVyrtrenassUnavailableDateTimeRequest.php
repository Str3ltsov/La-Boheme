<?php

namespace App\Http\Requests;

use App\Models\VyrtrenassUnavailableDateTime;
use Illuminate\Foundation\Http\FormRequest;

class CreateVyrtrenassUnavailableDateTimeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return VyrtrenassUnavailableDateTime::$rules;
//        return VyrtrenassUnavailableDateTime::$rules;
    }
}
