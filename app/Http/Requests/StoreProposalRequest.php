<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProposalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'item'  => 'required|string|min:5|max:50',
            'value' => 'required|numeric|min:0.01',
        ];
    }

    public function messages()
    {
        return [
            'value.required' => 'O valor da proposta é obrigatório.',
            'value.numeric'  => 'O valor da proposta deve ser um número válido.',
            'value.min'      => 'O valor da proposta deve ser maior que R$ 0,01.',
            'item.required'  => 'O campo Item Vendido é obrigatório.',
            'item.min'       => 'O campo Item Vendido deve ter ao menos 5 caracteres.',
            'item.max'       => 'O campo Item Vendido deve ter no máximo 50 caracteres.',
        ];
    }
}
