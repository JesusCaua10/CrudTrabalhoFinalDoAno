<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Folhas de Pagamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-app-layout>
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Cargos</h1>
    <a href="{{ route('cargos.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded">+ Novo Cargo</a>
    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-2">Nome</th>
                <th class="p-2">Salário Base</th>
                <th class="p-2">Nível de Acesso</th>
                <th class="p-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cargos as $cargo)
                <tr class="border-t">
                    <td class="p-2">{{ $cargo->nome }}</td>
                    <td class="p-2">R$ {{ number_format($cargo->salario_base,2,',','.') }}</td>
                    <td class="p-2">{{ $cargo->nivel_acesso }}</td>
                    <td class="p-2">
                        <a href="{{ route('cargos.edit',$cargo) }}" class="text-blue-500">Editar</a> |
                        <form action="{{ route('cargos.destroy',$cargo) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-500">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>