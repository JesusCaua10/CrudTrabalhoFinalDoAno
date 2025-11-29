<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CargoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $cargoId = $this->cargo ? $this->cargo->id : null;

        return [
            'nome' => 'required|string|max:255|unique:cargos,nome,' . $cargoId,
            'salario_base' => 'required|numeric|min:0',
            'nivel_acesso' => 'required|string|max:50',
        ];
    }
}
