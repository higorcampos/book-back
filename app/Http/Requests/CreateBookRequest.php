<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateBookRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Defina como true se desejar permitir a autorização sempre
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
            'pages' => 'required|integer|min:1',
            'published_at' => 'nullable|date',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'O campo de título é obrigatório.',
            'title.string' => 'O campo de título deve ser uma string.',
            'title.max' => 'O campo de título deve ter no máximo 255 caracteres.',
            'description.required' => 'O campo de descrição é obrigatório.',
            'description.string' => 'O campo de descrição deve ser uma string.',
            'author.required' => 'O campo de autor é obrigatório.',
            'author.string' => 'O campo de autor deve ser uma string.',
            'author.max' => 'O campo de autor deve ter no máximo 255 caracteres.',
            'pages.required' => 'O campo de páginas é obrigatório.',
            'pages.integer' => 'O campo de páginas deve ser um número inteiro.',
            'pages.min' => 'O campo de páginas deve ser no mínimo 1.',
            'published_at.date' => 'O campo de data de publicação deve ser uma data.',
        ];
    }
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }
}
