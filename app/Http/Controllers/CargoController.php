<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index() {
        $cargos = Cargo::all();
        return view('cargos.index', compact('cargos'));
    }

    public function create() {
        return view('cargos.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required',
            'salario_base' => 'required|numeric',
            'nivel_acesso' => 'required'
        ]);
        Cargo::create($request->all());
        return redirect()->route('cargos.index')->with('success', 'Cargo criado!');
    }

    public function edit(Cargo $cargo) {
        return view('cargos.edit', compact('cargo'));
    }

    public function update(Request $request, Cargo $cargo) {
        $cargo->update($request->all());
        return redirect()->route('cargos.index')->with('success', 'Cargo atualizado!');
    }

    public function destroy(Cargo $cargo) {
        $cargo->delete();
        return redirect()->route('cargos.index')->with('success', 'Cargo excluído!');
    }
}