<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactorRequest extends FormRequest
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
            'id' => 'nullable|integer',
            'title' => 'required|string',
            'price' => 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/|nullable',
            'vehicle_ids.*' => 'integer',
            'driver_ids.*' => 'integer',
            'category_ids.*' => 'integer',
            'description' => 'string|nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:4048',
        ];
    }
}
