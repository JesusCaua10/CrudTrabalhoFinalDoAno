<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeriasRequest;
use App\Models\Ferias;
use App\Models\Funcionario;

class FeriasController extends Controller
{
    public function index()
    {
        $feria = Ferias::with('funcionario')->paginate(10);
        return view('ferias.index', compact('feria'));
    }

    public function create()
    {
        $funcionarios = Funcionario::all();
        return view('ferias.create', compact('funcionarios'));
    }

    public function store(FeriasRequest $request)
    {
        Ferias::create($request->validated());
        return redirect()->route('ferias.index')->with('success', 'Férias registradas com sucesso!');
    }

    public function edit(Ferias $feria)
    {
        $funcionarios = Funcionario::all();
        return view('ferias.edit', compact('feria', 'funcionarios'));
    }

    public function update(FeriasRequest $request, Ferias $feria)
    {
        $feria->update($request->validated());
        return redirect()->route('ferias.index')->with('success', 'Férias atualizadas com sucesso!');
    }

    public function destroy(Ferias $feria)
    {
        $feria->delete();
        return redirect()->route('ferias.index')->with('success', 'Férias excluídas com sucesso!');
    }
}
