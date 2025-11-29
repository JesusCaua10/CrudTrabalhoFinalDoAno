<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $departamentoId = $this->departamento ? $this->departamento->id : null;

        return [
            'nome' => 'required|string|max:255|unique:departamentos,nome,' . $departamentoId,
        ];
    }
}
