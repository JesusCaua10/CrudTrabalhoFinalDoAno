<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        return view('cargo.index', compact('cargos'));
    }

    public function create()
    {
        return view('cargo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
        ]);

        Cargo::create([
            'nome' => $request->nome,
            'salario' => $request->salario,
        ]);

        return redirect()->route('cargo.index')->with('success', 'Cargo criado com sucesso!');
    }

    public function edit(Cargo $cargo)
    {
        return view('cargo.edit', compact('cargo'));
    }

    public function update(Request $request, Cargo $cargo)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
        ]);

        $cargo->update([
            'nome' => $request->nome,
            'salario' => $request->salario,
        ]);

        return redirect()->route('cargo.index')->with('success', 'Cargo atualizado com sucesso!');
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return redirect()->route('cargo.index')->with('success', 'Cargo deletado com sucesso!');
    }
}