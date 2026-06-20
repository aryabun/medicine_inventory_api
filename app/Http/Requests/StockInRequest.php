<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StockInRequest extends FormRequest
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
            'product_id'    => 'required|exists:products,id',
            'facility_id'   => 'nullable|exists:facilities,id',
            'batch_no'      => 'required|string|max:50',
            'exp_date'      => 'required|date|after:today',
            'qty' => 'required|integer|min:1',
            'note'          => 'nullable|string|max:255',
        ];
    }
}
