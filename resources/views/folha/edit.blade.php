<x-app-layout>
<div class="p-6 max-w-md mx-auto">
    <h2 class="text-xl font-bold mb-4">Editar Folha de Pagamento</h2>
    <form action="{{ route('folha.update', $folha) }}" method="POST" class="space-y-3">
        @csrf @method('PUT')
        <select name="funcionario_id" class="w-full border p-2 rounded" id="funcionarioSelectEdit">
            @foreach ($funcionarios as $f)
                <option value="{{ $f->id }}" data-salario="{{ $f->salario }}" @if($f->id == $folha->funcionario_id) selected @endif>
                    {{ $f->nome }}
                </option>
            @endforeach
        </select>

        <input name="data_pagamento" type="date" class="w-full border p-2 rounded" value="{{ $folha->data_pagamento }}" required>

        <input name="salario_bruto" id="salarioInputEdit" class="w-full border p-2 rounded" value="{{ $folha->salario_bruto }}" readonly required>
        <input name="descontos" placeholder="Descontos" class="w-full border p-2 rounded" value="{{ $folha->descontos }}" required>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Atualizar</button>
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