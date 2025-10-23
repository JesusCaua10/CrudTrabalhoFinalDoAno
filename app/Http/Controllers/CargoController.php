<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    // 1️⃣ Lista todos os cargos
    public function index()
    {
        $cargos = Cargo::all();
        return view('cargo.index', compact('cargos'));
    }

    // 2️⃣ Mostra o formulário de criação
    public function create()
    {
        return view('cargo.create');
    }

    // 3️⃣ Salva um novo cargo
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'salario_base' => 'required|numeric',
            'nivel_acesso' => 'required|in:admin,usuario'
        ]);

        Cargo::create($request->all());
        return redirect()->route('cargo.index')->with('success', 'Cargo criado com sucesso!');
    }

    // 4️⃣ Mostra um cargo específico
    public function show(Cargo $cargo)
    {
        return view('cargo.show', compact('cargo'));
    }

    // 5️⃣ Mostra o formulário de edição
    public function edit(Cargo $cargo)
    {
        return view('cargo.edit', compact('cargo'));
    }

    // 6️⃣ Atualiza um cargo existente
    public function update(Request $request, Cargo $cargo)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'salario_base' => 'required|numeric',
            'nivel_acesso' => 'required|in:admin,usuario'
        ]);

        $cargo->update($request->all());
        return redirect()->route('cargo.index')->with('success', 'Cargo atualizado com sucesso!');
    }

    // 7️⃣ Exclui um cargo
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return redirect()->route('cargo.index')->with('success', 'Cargo excluído com sucesso!');
    }
}