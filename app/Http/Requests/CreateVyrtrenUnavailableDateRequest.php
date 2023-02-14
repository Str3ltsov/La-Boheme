<?php

namespace App\Http\Requests;

use App\Models\VyrtrenUnavailableDate;
use Illuminate\Foundation\Http\FormRequest;

class CreateVyrtrenUnavailableDateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return VyrtrenUnavailableDate::$rules;
    }
}