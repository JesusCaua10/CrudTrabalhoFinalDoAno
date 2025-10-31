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

    $salarioLiquido = $request->salario_bruto - $request->descontos;

    FolhaDePaga::create([
        'funcionario_id' => $request->funcionario_id,
        'salario_bruto' => $request->salario_bruto,
        'descontos' => $request->descontos,
        'salario_liquido' => $salarioLiquido,
        'data_pagamento' => $request->data_pagamento,
    ]);

    return redirect()->route('folhadepaga.index')->with('success', 'Folha de pagamento criada com sucesso!');
    }

    public function show(FolhaDePaga $folhadepaga)
    {
        return view('folhadepaga.show', ['folha' => $folhadepaga]);
    }

    public function edit(FolhaDePaga $folhadepaga)
    {
        $funcionarios = Funcionario::all();
        // Passa $folhadepaga como $folha para a view
        return view('folhadepaga.edit', ['folha' => $folhadepaga, 'funcionarios' => $funcionarios]);
    }

    public function update(Request $request, FolhaDePaga $folhadepaga)
    {
    $request->validate([
        'funcionario_id' => 'required|exists:funcionarios,id',
        'data_pagamento' => 'required|date',
        'salario_bruto' => 'required|numeric',
        'descontos' => 'nullable|numeric',
    ]);

    $folhadepaga->update([
        'funcionario_id' => $request->funcionario_id,
        'salario_bruto' => $request->salario_bruto,
        'descontos' => $request->descontos,
        'salario_liquido' => $request->salario_bruto - $request->descontos,
        'data_pagamento' => $request->data_pagamento,
    ]);

    return redirect()->route('folhadepaga.index')->with('success', 'Folha de pagamento atualizada com sucesso!');
    }
    public function destroy(FolhaDePaga $folhadepaga)
    {
        $folhadepaga->delete();
        return redirect()->route('folhadepaga.index')->with('success', 'Folha de pagamento deletada com sucesso!');
    }
}