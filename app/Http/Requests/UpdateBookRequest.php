<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'author' => 'sometimes|required|string|max:255',
            'pages' => 'sometimes|required|integer|min:1',
            'published_at' => 'nullable|date',
        ];
    }

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
}
