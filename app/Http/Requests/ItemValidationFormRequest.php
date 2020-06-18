<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemValidationFormRequest extends FormRequest
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
            'name' =>'required',
            'amount' => 'required | numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'Nome é obrigatório',
            'amount.required' => 'Quantidade é obrigatória',
            'amount.numeric' => 'Quantidade é um campo numérico'
        ];
    }
}
