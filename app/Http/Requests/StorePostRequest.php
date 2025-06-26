<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => "bail|required|string|max:255|unique:posts,title,{$this->id}",
            'body' => 'bail|required|string',
            'author' => 'bail|required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'mandatory field',
            'body.required' => 'mandatory field',
            'author.required' => 'mandatory field',
        ];
    }
}
