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
        return view('folhadepaga.index', compact('folhas'));
    }

    public function create()
    {
        $funcionarios = Funcionario::all();
        return view('folhadepaga.create', compact('funcionarios'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'salario_bruto' => 'required|numeric|min:0',
            'descontos' => 'required|numeric|min:0',
            'data_pagamento' => 'required|date',
        ]);

        FolhaDePaga::create([
            'funcionario_id' => $request->funcionario_id,
            'salario_bruto' => $request->salario_bruto,
            'descontos' => $request->descontos,
            'salario_liquido' => $request->salario_bruto - $request->descontos,
            'data_pagamento' => $request->data_pagamento,
        ]);

        return redirect()->route('folhadepaga.index')->with('success', 'Folha de pagamento criada com sucesso!');

    }

    public function show(FolhaDePaga $folha)
    {
        
    }

    public function edit(FolhaDePaga $folha)
    {
        $funcionarios = Funcionario::all();
        return view('folhadepaga.edit', compact('folha', 'funcionarios'));
    }

    public function update(Request $request, FolhaDePaga $folha)
    {
        $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'data_pagamento' => 'required|date',
            'salario_bruto' => 'required|numeric',
            'descontos' => 'nullable|numeric',
            'salario_liquido' => 'required|numeric',
        ]);

        $folha->update($request->all());

        return redirect()->route('folhadepaga.index')->with('success', 'Folha de pagamento atualizada com sucesso!');
    }

    public function destroy(FolhaDePaga $folha)
    {
        $folha->delete();
        return redirect()->route('folhadepaga.index')->with('success', 'Folha de pagamento deletada com sucesso!');
    }
}