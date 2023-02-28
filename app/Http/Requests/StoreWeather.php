<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeather extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'around_temperature' => 'required_without_all:water_temperature,water_ph,humidity|nullable|numeric|between:0,100',
            'water_temperature' => 'nullable|numeric|between:0,100',
            'water_ph' => 'nullable|numeric|between:0,14',
            'humidity' => 'nullable|numeric|between:0,100'
        ];
    }
}
