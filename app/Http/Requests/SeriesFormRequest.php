<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:1'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'O campo :atribute deve ser preenchido',
            'nome.min' => 'O campo nome de ter no minimo 3 cracteres'
        ];

    }
}
