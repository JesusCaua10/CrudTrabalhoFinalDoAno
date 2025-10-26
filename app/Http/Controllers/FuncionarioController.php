<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Cargo;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::with('cargo')->get();
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        $cargos = Cargo::all();
        return view('funcionarios.create', compact('cargos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'email' => 'required|email|unique:funcionarios,email',
            'telefone' => 'nullable|string|max:20',
            'cargo_id' => 'required|exists:cargos,id',
            'data_admissao' => 'nullable|date',
        ]);

        Funcionario::create($request->all());

        return redirect()->route('funcionario.index')->with('success', 'Funcionário criado com sucesso!');
    }

    public function show(Funcionario $funcionario)
    {
        
    }

    public function edit(Funcionario $funcionario)
    {
        $cargos = Cargo::all();
        return view('funcionarios.edit', compact('funcionario', 'cargos'));
    }

    public function update(Request $request, Funcionario $funcionario)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'email' => 'required|email|unique:funcionarios,email,' . $funcionario->id,
            'telefone' => 'nullable|string|max:20',
            'cargo_id' => 'required|exists:cargos,id',
            'data_admissao' => 'nullable|date',
        ]);

        $funcionario->update($request->all());

        return redirect()->route('funcionario.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();
        return redirect()->route('funcionario.index')->with('success', 'Funcionário deletado com sucesso!');
    }
}