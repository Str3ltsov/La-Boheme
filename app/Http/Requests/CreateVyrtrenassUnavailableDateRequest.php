<?php

namespace App\Http\Requests;

use App\Models\VyrtrenassUnavailableDate;
use Illuminate\Foundation\Http\FormRequest;

class CreateVyrtrenassUnavailableDateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return VyrtrenassUnavailableDate::$rules;
    }
}
