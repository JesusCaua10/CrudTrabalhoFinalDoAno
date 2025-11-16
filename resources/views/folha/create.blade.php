<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova Folha de Pagamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

<x-app-layout>

    <div>
        <h2>Nova Folha de Pagamento</h2>

        <form action="{{ route('folha.store') }}" method="POST">
            @csrf

            <select name="funcionario_id" id="funcionarioSelect">
                <option value="">Selecione o funcionário</option>
                @foreach ($funcionarios as $f)
                    <option value="{{ $f->id }}" data-salario="{{ $f->salario }}">
                        {{ $f->nome }}
                    </option>
                @endforeach
            </select>

            <input type="date" name="data_pagamento">

            <input name="salario_bruto" id="salarioInput" readonly>

            <input name="descontos">

            <button>Salvar</button>
        </form>
    </div>

    <script>
        const select = document.getElementById('funcionarioSelect');
        const salarioInput = document.getElementById('salarioInput');

        select.addEventListener('change', function() {
            const salario = select.selectedOptions[0].dataset.salario || 0;
            salarioInput.value = salario;
        });
    </script>

</x-app-layout>

</body>
</html>