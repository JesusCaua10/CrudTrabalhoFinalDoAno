<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Folhas de Pagamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-app-layout>
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Funcionários</h1>
    <a href="{{ route('funcionarios.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded">+ Novo Funcionário</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-2">Nome</th>
                <th class="p-2">Email</th>
                <th class="p-2">Cargo</th>
                <th class="p-2">Salário</th>
                <th class="p-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($funcionarios as $f)
            <tr class="border-t">
                <td class="p-2">{{ $f->nome }}</td>
                <td class="p-2">{{ $f->email }}</td>
                <td class="p-2">{{ $f->cargo->nome ?? '-' }}</td>
                <td class="p-2">R$ {{ number_format($f->salario, 2, ',', '.') }}</td>
                <td class="p-2">
                    <a href="{{ route('funcionarios.edit', $f) }}" class="text-blue-500">Editar</a> |
                    <form action="{{ route('funcionarios.destroy', $f) }}" method="POST" class="inline">
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