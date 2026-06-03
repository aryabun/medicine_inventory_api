<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FacilityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'postal_code' => 'required',
            'name_kh' => '',
            'name_en' => 'required',
            'prefix' => '',
            'prefix_code' => '',
            'level' => '',
            'od' => '',
            'address' => '',
            'p_code' => '',
            'd_code' => '',
            'c_code' => '',
            'v_code' => '',
        ];
    }
}
