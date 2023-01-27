<?php

namespace App\Http\Requests;

use App\Models\HallUnavailableDate;
use Illuminate\Foundation\Http\FormRequest;

class CreateVyrtrenUnavailableDateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return HallUnavailableDate::$rules;
    }
}
