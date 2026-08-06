<?php

namespace App\Http\Requests\Task;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
            'text_title' => 'required|string|min:3|max:100',
            'text_note' => 'required|string|max:1000',
            'priority' => 'required|integer|in:0,1,2',
            'date_limited' => 'required|date|after_or_equal:today',
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'text_title.required' => 'The task title field is required.',
            'text_title.string' => 'The task title must be a valid string.',
            'text_title.min' => 'The task title must be at least 3 characters.',
            'text_title.max' => 'The task title must not exceed 100 characters.',

            'text_note.required' => 'The task content field is required.',
            'text_note.string' => 'The task content must be a valid string.',
            'text_note.max' => 'The task content must not exceed 1000 characters.',

            'priority.required' => 'The priority field is required.',
            'priority.integer' => 'The priority must be an integer.',
            'priority.in' => 'Please select a valid priority level.',

            'date_limited.required' => 'The limit date field is required.',
            'date_limited.date' => 'Please enter a valid date.',
            'date_limited.after_or_equal' => 'The limit date must be today or a future date.',
        ];
    }
}
