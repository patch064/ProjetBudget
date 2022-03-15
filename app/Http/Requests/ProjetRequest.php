<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetRequest extends FormRequest
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
            'libelle' => 'bail|required|min:1|max:191|string',
            'cout' => 'bail|numeric|between:0,10000000',
            'description' => 'bail|required|min:0|max:200|string',
        ];
    }
}
