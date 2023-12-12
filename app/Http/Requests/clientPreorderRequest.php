<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clientPreorderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'preorder_id'=>['required'],
            'product_id'=>['required'],
            'product_name'=>['required','string'],
            'total_price' => ['required'],
            'total_quantity'=>['required'],
            'user_id'=>['required']
        ];
    }
}
