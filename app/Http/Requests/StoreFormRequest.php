<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;

class StoreFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // allow all for demo
    }

    public function rules(): array
    {
        return [
            // Text input
            'text_field' => ['required', 'string', 'max:255'],

            // Email
            'email' => ['required', 'email:dns', 'max:255', Rule::unique('users', 'email')->ignore($this->user()->id ?? null)],

            // Password
            'password' => ['required', Password::min(8)->letters()->numbers()->symbols()->mixedCase()],

            // Number
            'number' => ['required', 'numeric', 'min:1', 'max:100'],

            // Date
            'date' => ['required', 'date_format:Y-m-d'],

            // Datetime-local
            'datetime_local' => ['required', 'date_format:Y-m-d\TH:i'],

            // Color
            'color' => ['required', 'regex:/^#[a-fA-F0-9]{6}$/'],

            // File
            'file' => ['required', File::types(['jpg','png','pdf'])->max(2048)],

            // URL
            'url' => ['required', 'url'],

            // Checkbox (must be accepted)
            'checkbox' => ['accepted'],

            // Radio
            'gender' => ['required', 'in:male,female'],

            // Range
            'range' => ['required', 'integer', 'between:1,100'],

            // Tel
            'tel' => ['required', 'regex:/^[0-9+\-\s()]{6,20}$/'],

            // Hidden
            'hidden' => ['nullable', 'string'],

            // Month
            'month' => ['required', 'date_format:Y-m'],

            // Time
            'time' => ['required', 'date_format:H:i'],

            // Week
            'week' => ['required', 'date_format:Y-\WW'],

            // Search
            'search' => ['nullable', 'string', 'max:255'],

            // Button, submit, reset, image (no validation needed)
            // You could validate <input type="image" name="img_submit"> coordinates if needed
            'img_submit.x' => ['nullable', 'integer'],
            'img_submit.y' => ['nullable', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address with a proper domain (e.g. user@example.com).',
            'email.unique' => 'This email is already taken.',
            'checkbox.accepted' => 'You must agree to continue.',
            'file.mimes' => 'Only JPG, PNG, and PDF files are allowed.',
            'file.max' => 'File size must be less than 2MB.',
            'gender.in' => 'Please select a valid gender.',
            'range.between' => 'Value must be between 1 and 100.',
            'tel.regex' => 'Enter a valid phone number.',
            'color.regex' => 'Enter a valid hex color code (e.g., #ffffff).',
            'month.date_format' => 'Month must be in YYYY-MM format.',
            'time.date_format' => 'Time must be in HH:MM format.',
            'week.date_format' => 'Week must be in YYYY-WW format.',
            'datetime_local.date_format' => 'Date and time must be in YYYY-MM-DDTHH:MM format.',
        ];
    }
}
