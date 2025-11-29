<?php

namespace App\Http\Controllers;

use App\Http\Requests\FolhaRequest;
use App\Models\FolhaDePaga;
use App\Models\Funcionario;

class FolhaDePagaController extends Controller
{
    public function index()
    {
        $folhas = FolhaDePaga::with('funcionario')->paginate(10);
        return view('folha.index', compact('folhas'));
    }

    public function create()
    {
        $funcionarios = Funcionario::all();
        return view('folha.create', compact('funcionarios'));
    }

    public function store(FolhaRequest $request)
    {
        FolhaDePaga::create($request->validated());
        return redirect()->route('folha.index')->with('success', 'Folha de pagamento criada com sucesso!');
    }

    public function edit(FolhaDePaga $folha)
    {
        $funcionarios = Funcionario::all();
        return view('folha.edit', compact('folha', 'funcionarios'));
    }

    public function update(FolhaRequest $request, FolhaDePaga $folha)
    {
        $folha->update($request->validated());
        return redirect()->route('folha.index')->with('success', 'Folha de pagamento atualizada com sucesso!');
    }

    public function destroy(FolhaDePaga $folha)
    {
        $folha->delete();
        return redirect()->route('folha.index')->with('success', 'Folha de pagamento excluída com sucesso!');
    }
}
