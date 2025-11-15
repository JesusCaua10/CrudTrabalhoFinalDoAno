<?php
namespace App\Http\Controllers;


use App\Models\Departamento;
use Illuminate\Http\Request;


class DepartamentoController extends Controller
{
public function index()
{
$departamentos = Departamento::all();
return view('departamentos.index', compact('departamentos'));
}


public function create()
{
return view('departamentos.create');
}


public function store(Request $request)
{
$request->validate([
'nome' => 'required|string|max:255'
]);


Departamento::create($request->all());


return redirect()->route('departamentos.index')
->with('success', 'Departamento criado com sucesso!');
}


public function edit($id)
{
$departamento = Departamento::findOrFail($id);
return view('departamentos.edit', compact('departamento'));
}


public function update(Request $request, $id)
{
$request->validate([
'nome' => 'required|string|max:255'
]);


$departamento = Departamento::findOrFail($id);
$departamento->update($request->all());


return redirect()->route('departamentos.index')
->with('success', 'Departamento atualizado com sucesso!');
}


public function destroy($id)
{
$departamento = Departamento::findOrFail($id);
$departamento->delete();


return redirect()->route('departamentos.index')
->with('success', 'Departamento removido com sucesso!');
}
}