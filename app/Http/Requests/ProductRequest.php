<?php
namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'           => 'required',
            //  Add 'nullable' so the request doesn't fail when 'code' is empty
            'code'           => 'nullable|string|unique:products,code',
            'description'    => '',
            'category_id'    => '',
            'dosage_form_id' => '',
            'dosage'         => '',
            'image'          => 'nullable|image|sometimes|mimes:jpeg,png,jpg|max:2048',
            'status'         => '',

        ];
    }
}
