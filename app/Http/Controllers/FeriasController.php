<?php

namespace App\Http\Controllers;

use App\Models\Ferias;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FeriasController extends Controller
{
    public function index()
    {
        $ferias = Ferias::with('funcionario')->paginate(10);
        return view('ferias.index', compact('ferias'));
    }

    public function create()
    {
        $funcionarios = Funcionario::all();
        return view('ferias.create', compact('funcionarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'observacoes' => 'nullable|string'
        ]);

        $request['dias'] = now()->parse($request->data_inicio)->diffInDays($request->data_fim) + 1;

        Ferias::create($request->all());

        return redirect()->route('ferias.index')->with('success', 'Férias registradas com sucesso!');
    }

    public function edit(Ferias $feria)
    {
        $funcionarios = Funcionario::all();
        return view('ferias.edit', compact('feria', 'funcionarios'));
    }

    public function update(Request $request, Ferias $feria)
    {
        $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'observacoes' => 'nullable|string'
        ]);

        $request['dias'] = now()->parse($request->data_inicio)->diffInDays($request->data_fim) + 1;

        $feria->update($request->all());

        return redirect()->route('ferias.index')->with('success', 'Férias atualizadas com sucesso!');
    }

    public function destroy(Ferias $feria)
    {
        $feria->delete();
        return redirect()->route('ferias.index')->with('success', 'Férias removidas!');
    }
}
