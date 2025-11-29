<?php

namespace App\Http\Controllers;

use App\Http\Requests\CargoRequest;
use App\Models\Cargo;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::paginate(10);
        return view('cargos.index', compact('cargos'));
    }

    public function create()
    {
        return view('cargos.create');
    }

    public function store(CargoRequest $request)
    {
        Cargo::create($request->validated());
        return redirect()->route('cargos.index')->with('success', 'Cargo criado com sucesso!');
    }

    public function edit(Cargo $cargo)
    {
        return view('cargos.edit', compact('cargo'));
    }

    public function update(CargoRequest $request, Cargo $cargo)
    {
        $cargo->update($request->validated());
        return redirect()->route('cargos.index')->with('success', 'Cargo atualizado com sucesso!');
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return redirect()->route('cargos.index')->with('success', 'Cargo excluído com sucesso!');
    }
}
