<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        $cargo = Cargo::all();
        return view('cargo.index', compact('cargo'));
    }

    public function create()
    {
        return view('cargo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'salario_base' => 'required|numeric',
            'nivel_acesso' => 'required|in:admin,usuario',
        ]);

        Cargo::create($request->all());

        return redirect()->route('cargo.index')->with('success', 'Cargo criado com sucesso!');
    }

    public function show(Cargo $cargo)
    {
        
    }

    public function edit(Cargo $cargo)
    {
        return view('cargo.edit', compact('cargo'));
    }

    public function update(Request $request, Cargo $cargo)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'salario_base' => 'required|numeric',
            'nivel_acesso' => 'required|in:admin,usuario',
        ]);

        $cargo->update($request->all());

        return redirect()->route('cargo.index')->with('success', 'Cargo atualizado com sucesso!');
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return redirect()->route('cargo.index')->with('success', 'Cargo deletado com sucesso!');
    }
}