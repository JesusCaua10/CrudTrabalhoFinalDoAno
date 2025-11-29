<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $funcionarioId = $this->funcionario ? $this->funcionario->id : null;

        return [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios,email,' . $funcionarioId,
            'cargo_id' => 'required|exists:cargos,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'salario' => 'nullable|numeric|min:0',
            'data_admissao' => 'required|date',
        ];
    }
}
