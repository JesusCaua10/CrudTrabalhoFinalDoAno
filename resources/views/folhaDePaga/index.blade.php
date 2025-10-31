<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Folhas de Pagamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Folhas de Pagamento</h1>

    @if(session('success'))
        <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('folhadepaga.create') }}"
       class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
       + Nova Folha
    </a>

    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Funcionário</th>
                <th class="p-2 border">Salário Bruto</th>
                <th class="p-2 border">Descontos</th>
                <th class="p-2 border">Salário Líquido</th>
                <th class="p-2 border">Data</th>
                <th class="p-2 border">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($folhas as $folha)
                <tr class="text-center">
                    <td class="p-2 border">{{ $folha->id }}</td>
                    <td class="p-2 border">{{ $folha->funcionario->nome }}</td>
                    <td class="p-2 border">R$ {{ number_format($folha->salario_bruto, 2, ',', '.') }}</td>
                    <td class="p-2 border">R$ {{ number_format($folha->descontos, 2, ',', '.') }}</td>
                    <td class="p-2 border">R$ {{ number_format($folha->salario_liquido, 2, ',', '.') }}</td>
                    <td class="p-2 border">{{ $folha->data_pagamento }}</td>
                    <td class="p-2 border flex justify-center gap-2">
                        <a href="{{ route('folhadepaga.edit', $folha->id) }}"
                           class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>
                        <form action="{{ route('folhadepaga.destroy', $folha->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>