<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Folha de Pagamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="container mx-auto max-w-lg bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Nova Folha de Pagamento</h2>

    @if ($errors->any())
        <div class="mb-4 p-2 bg-red-200 text-red-800 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('folhadepaga.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="funcionario_id" class="block font-medium text-gray-700">Funcionário</label>
            <select name="funcionario_id" id="funcionario_id" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="">Selecione</option>
                @foreach($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="salario_bruto" class="block font-medium text-gray-700">Salário Bruto</label>
            <input type="number" name="salario_bruto" id="salario_bruto" step="0.01" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="descontos" class="block font-medium text-gray-700">Descontos</label>
            <input type="number" name="descontos" id="descontos" step="0.01" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="salario_liquido" class="block font-medium text-gray-700">Salário Líquido</label>
            <input type="number" id="salario_liquido" readonly
                   class="mt-1 block w-full border-gray-300 rounded-md bg-gray-100 cursor-not-allowed">
        </div>

        <div class="mb-4">
            <label for="data_pagamento" class="block font-medium text-gray-700">Data de Pagamento</label>
            <input type="date" name="data_pagamento" id="data_pagamento" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Salvar</button>
            <a href="{{ route('folhadepaga.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">← Voltar</a>
        </div>
    </form>
</div>

<script>
    const bruto = document.getElementById('salario_bruto');
    const descontos = document.getElementById('descontos');
    const liquido = document.getElementById('salario_liquido');

    function calcularLiquido() {
        const b = parseFloat(bruto.value) || 0;
        const d = parseFloat(descontos.value) || 0;
        liquido.value = (b - d).toFixed(2);
    }

    bruto.addEventListener('input', calcularLiquido);
    descontos.addEventListener('input', calcularLiquido);
</script>

</body>
</html>