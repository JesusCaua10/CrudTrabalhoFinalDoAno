<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Folha de Pagamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<x-app-layout>

    <div>
        <h2>Editar Folha de Pagamento</h2>

        <form action="{{ route('folha.update', $folha) }}" method="POST">
            @csrf
            @method('PUT')

            <select name="funcionario_id" id="funcionarioSelectEdit">
                @foreach ($funcionarios as $f)
                    <option value="{{ $f->id }}" data-salario="{{ $f->salario }}"
                        @if($f->id == $folha->funcionario_id) selected @endif>
                        {{ $f->nome }}
                    </option>
                @endforeach
            </select>

            <input type="date" name="data_pagamento" value="{{ $folha->data_pagamento }}" required>

            <input name="salario_bruto" id="salarioInputEdit" value="{{ $folha->salario_bruto }}" readonly required>

            <input name="descontos" value="{{ $folha->descontos }}" required>

            <button>Atualizar</button>
        </form>
    </div>

    <script>
        const selectEdit = document.getElementById('funcionarioSelectEdit');
        const salarioInputEdit = document.getElementById('salarioInputEdit');

        selectEdit.addEventListener('change', function() {
            const salario = selectEdit.selectedOptions[0].dataset.salario || 0;
            salarioInputEdit.value = salario;
        });
    </script>

</x-app-layout>
</body>
</html>