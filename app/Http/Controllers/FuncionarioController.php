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
        return view('funcionario.index', compact('funcionarios'));
    }

    public function create()
    {
        $cargos = Cargo::all();
        return view('funcionario.create', compact('cargos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios,email',
            'cargo_id' => 'required|exists:cargos,id',
        ]);

        Funcionario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'cargo_id' => $request->cargo_id,
        ]);

        return redirect()->route('funcionario.index')->with('success', 'Funcionário criado com sucesso!');
    }

    public function edit(Funcionario $funcionario)
    {
        $cargos = Cargo::all();
        return view('funcionario.edit', compact('funcionario', 'cargos'));
    }

    public function update(Request $request, Funcionario $funcionario)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios,email,' . $funcionario->id,
            'cargo_id' => 'required|exists:cargos,id',
        ]);

        $funcionario->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'cargo_id' => $request->cargo_id,
        ]);

        return redirect()->route('funcionario.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();
        return redirect()->route('funcionario.index')->with('success', 'Funcionário deletado com sucesso!');
    }
}