<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge($this->get('article'));
    }

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
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'body' => ['required'],
            'tagList' => ['sometimes', 'array'],
            'tagList.*' => ['sometimes', 'string', 'max:255']
        ];
    }
}
