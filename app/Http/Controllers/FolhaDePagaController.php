<?php

namespace App\Http\Controllers;

use App\Models\FolhaDePaga;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FolhaDePagaController extends Controller
{
    public function index()
    {
        $folhas = FolhaDePaga::with('funcionario')->get();
        return view('folha.index', compact('folhas'));
    }

    public function create()
    {
        $funcionarios = Funcionario::all();
        return view('folha.create', compact('funcionarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'data_pagamento' => 'required|date',
            'descontos' => 'required|numeric'
        ]);

        $funcionario = Funcionario::find($request->funcionario_id);

        $salario_bruto = $funcionario->salario;
        $salario_liquido = $salario_bruto - $request->descontos;

        FolhaDePaga::create([
            'funcionario_id' => $request->funcionario_id,
            'data_pagamento' => $request->data_pagamento,
            'salario_bruto' => $salario_bruto,
            'descontos' => $request->descontos,
            'salario_liquido' => $salario_liquido
        ]);

        return redirect()->route('folha.index')->with('success', 'Folha registrada!');
    }

    public function edit(FolhaDePaga $folha)
    {
        $funcionarios = Funcionario::all();
        return view('folha.edit', compact('folha', 'funcionarios'));
    }

    public function update(Request $request, FolhaDePaga $folha)
    {
        $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'data_pagamento' => 'required|date',
            'descontos' => 'required|numeric'
        ]);

        $funcionario = Funcionario::find($request->funcionario_id);

        $salario_bruto = $funcionario->salario;
        $salario_liquido = $salario_bruto - $request->descontos;

        $folha->update([
            'funcionario_id' => $request->funcionario_id,
            'data_pagamento' => $request->data_pagamento,
            'salario_bruto' => $salario_bruto,
            'descontos' => $request->descontos,
            'salario_liquido' => $salario_liquido
        ]);

        return redirect()->route('folha.index')->with('success', 'Folha atualizada!');
    }

    public function destroy(FolhaDePaga $folha)
    {
        $folha->delete();
        return redirect()->route('folha.index')->with('success', 'Folha excluída!');
    }
}