<x-app-layout>
<div class="p-6 max-w-md mx-auto">
    <h2 class="text-xl font-bold mb-4">Nova Folha de Pagamento</h2>
    <form action="{{ route('folha.store') }}" method="POST" class="space-y-3">
        @csrf
        <select name="funcionario_id" class="w-full border p-2 rounded" id="funcionarioSelect">
            <option value="">Selecione o funcionário</option>
            @foreach ($funcionarios as $f)
                <option value="{{ $f->id }}" data-salario="{{ $f->salario }}">
                    {{ $f->nome }}
                </option>
            @endforeach
        </select>

        <input name="data_pagamento" placeholder="Data de pagamento" type="date" class="w-full border p-2 rounded">
        <input name="salario_bruto" id="salarioInput" placeholder="Salário Bruto" class="w-full border p-2 rounded" readonly>
        <input name="descontos" placeholder="Descontos" class="w-full border p-2 rounded">

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Salvar</button>
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