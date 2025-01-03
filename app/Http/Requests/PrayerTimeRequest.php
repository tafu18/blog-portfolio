<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrayerTimeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'country' => 'required|string',
            'region' => 'required|string',
            'city' => 'required|string',
            'date' => 'nullable|date_format:Y-m-d',
            'days' => 'nullable|integer|min:1|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'country.required' => 'The country is required.',
            'region.required' => 'The region is required.',
            'city.required' => 'The city is required.',
        ];
    }
}
