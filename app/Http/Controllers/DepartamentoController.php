<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartamentoRequest;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::paginate(10);
        return view('departamentos.index', compact('departamentos'));
    }

    public function create()
    {
        return view('departamentos.create');
    }

    public function store(DepartamentoRequest $request)
    {
        Departamento::create($request->validated());
        return redirect()->route('departamentos.index')->with('success', 'Departamento criado com sucesso!');
    }

    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit', compact('departamento'));
    }

    public function update(DepartamentoRequest $request, Departamento $departamento)
    {
        $departamento->update($request->validated());
        return redirect()->route('departamentos.index')->with('success', 'Departamento atualizado com sucesso!');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('success', 'Departamento excluído com sucesso!');
    }
}
