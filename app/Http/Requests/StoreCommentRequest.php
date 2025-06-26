<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'content' => 'bail|required|string',
            'author' => 'bail|required|string',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'mandatory field',
            'author.required' => 'mandatory field',
        ];
    }
}
