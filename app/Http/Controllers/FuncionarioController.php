<?php
namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Cargo;
use App\Models\Departamento;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::with(['cargo', 'departamento'])->get();
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        $cargos = Cargo::all();
        $departamentos = Departamento::all();

        return view('funcionarios.create', compact('cargos', 'departamentos'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:funcionarios,email',
        'cargo_id' => 'required|exists:cargos,id',
        'departamento_id' => 'required|exists:departamentos,id',
    ]);

    // Pega o salário do cargo selecionado
    $cargo = Cargo::find($request->cargo_id);
    $salarioCargo = $cargo ? $cargo->salario_base : 0;

    Funcionario::create([
        'nome' => $request->nome,
        'email' => $request->email,
        'cargo_id' => $request->cargo_id,
        'departamento_id' => $request->departamento_id,
        'salario' => $salarioCargo,  // <-- aqui estava faltando
    ]);

    return redirect()->route('funcionarios.index')->with('success', 'Funcionário criado com sucesso!');
    }

    public function edit(Funcionario $funcionario)
    {
        $cargos = Cargo::all();
        $departamentos = Departamento::all();

        return view('funcionarios.edit', compact('funcionario', 'cargos', 'departamentos'));
    }

    public function update(Request $request, Funcionario $funcionario)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'email' => 'required|email|unique:funcionarios,email,' . $funcionario->id,
            'cargo_id' => 'required|exists:cargos,id',
            'departamento_id' => 'nullable|exists:departamentos,id',
        ]);

        $cargo = Cargo::find($request->cargo_id);
        $salarioCargo = $cargo ? $cargo->salario_base : 0;

        $funcionario->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'cargo_id' => $request->cargo_id,
            'departamento_id' => $request->departamento_id,
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
