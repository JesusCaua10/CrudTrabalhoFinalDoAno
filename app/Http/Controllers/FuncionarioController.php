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
            'cargo_id' => 'required|exists:cargos,id',
        ]);

        // Buscar o cargo selecionado
        $cargo = \App\Models\Cargo::find($request->cargo_id);

        // Caso o cargo não tenha salário definido, usar 0
        $salarioCargo = $cargo ? $cargo->salario_base : 0;

        // Criar o funcionário com o salário do cargo
        Funcionario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'cargo_id' => $request->cargo_id,
            'salario' => $salarioCargo,
        ]);

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário criado com sucesso!');
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
            'cargo_id' => 'required|exists:cargos,id',
        ]);

        $cargo = \App\Models\Cargo::find($request->cargo_id);
        $salarioCargo = $cargo ? $cargo->salario_base : 0;

        $funcionario->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'cargo_id' => $request->cargo_id,
            'salario' => $salarioCargo,
        ]);

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário excluído com sucesso!');
    }
}