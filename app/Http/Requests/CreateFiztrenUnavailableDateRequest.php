<?php

namespace App\Http\Requests;

use App\Models\FiztrenUnavailableDate;
use App\Models\VyrtrenUnavailableDate;
use Illuminate\Foundation\Http\FormRequest;

class CreateFiztrenUnavailableDateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return FiztrenUnavailableDate::$rules;
    }
}
