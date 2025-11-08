<x-app-layout>
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Folha de Pagamento</h1>
    <a href="{{ route('folha.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded">+ Nova Folha</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-2">Funcionário</th>
                <th class="p-2">Data de Pagamento</th>
                <th class="p-2">Bruto</th>
                <th class="p-2">Descontos</th>
                <th class="p-2">Líquido</th>
                <th class="p-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($folhas as $f)
            <tr class="border-t">
                <td class="p-2">{{ $f->funcionario->nome ?? '-' }}</td>
                <td class="p-2">{{ \Carbon\Carbon::parse($f->data_pagamento)->format('d/m/Y') }}</td>
                <td class="p-2">R$ {{ number_format($f->salario_bruto,2,',','.') }}</td>
                <td class="p-2">R$ {{ number_format($f->descontos,2,',','.') }}</td>
                <td class="p-2">R$ {{ number_format($f->salario_liquido,2,',','.') }}</td>
                <td class="p-2">
                    <a href="{{ route('folha.edit', $f) }}" class="text-blue-500">Editar</a> |
                    <form action="{{ route('folha.destroy', $f) }}" method="POST" class="inline">
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