<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeriasRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'funcionario_id' => 'required|exists:funcionarios,id',
            'data_inicio' => 'required|date|before_or_equal:data_fim',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'status' => 'required|in:Pendente,Aprovada,Rejeitada',
        ];
    }
}
