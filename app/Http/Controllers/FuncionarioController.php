<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioRequest;
use App\Models\Funcionario;
use App\Models\Cargo;
use App\Models\Departamento;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::with(['cargo', 'departamento'])->paginate(10);
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        $cargos = Cargo::all();
        $departamentos = Departamento::all();
        return view('funcionarios.create', compact('cargos', 'departamentos'));
    }

    public function store(FuncionarioRequest $request)
    {
        Funcionario::create($request->validated());
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário criado com sucesso!');
    }

    public function edit(Funcionario $funcionario)
    {
        $cargos = Cargo::all();
        $departamentos = Departamento::all();
        return view('funcionarios.edit', compact('funcionario', 'cargos', 'departamentos'));
    }

    public function update(FuncionarioRequest $request, Funcionario $funcionario)
    {
        $funcionario->update($request->validated());
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário excluído com sucesso!');
    }
}
