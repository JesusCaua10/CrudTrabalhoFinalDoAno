<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FolhaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'funcionario_id' => 'required|exists:funcionarios,id',
            'data_pagamento' => 'required|date',
            'salario_bruto' => 'required|numeric|min:0',
            'descontos' => 'nullable|numeric|min:0',
        ];
    }
}
