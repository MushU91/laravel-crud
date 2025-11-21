<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFamilyRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'address' => 'required|string|max:550',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'age.required' => 'Age is required.',
            'address.required' => 'Address is required.',
        ];
    }
}
