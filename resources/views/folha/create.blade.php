<x-app-layout>
    <div class="p-6 max-w-lg mx-auto">
        <h2 class="text-2xl font-bold text-white mb-6">Nova Folha de Pagamento</h2>

        <form action="{{ route('folha.store') }}" method="POST" class="space-y-4 bg-gray-800 p-6 rounded-xl shadow">
            @csrf

            {{-- Funcionário --}}
            <div>
                <x-input-label for="funcionarioSelect" value="Funcionário" class="text-gray-300" />
                <select id="funcionarioSelect" name="funcionario_id" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                    <option value="">Selecione o funcionário</option>
                    @foreach ($funcionarios as $f)
                        <option value="{{ $f->id }}" data-salario="{{ $f->salario }}">{{ $f->nome }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('funcionario_id')" class="mt-1" />
            </div>

            {{-- Data de Pagamento --}}
            <div>
                <x-input-label for="data_pagamento" value="Data de Pagamento" class="text-gray-300" />
                <input id="data_pagamento" name="data_pagamento" type="date" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                <x-input-error :messages="$errors->get('data_pagamento')" class="mt-1" />
            </div>

            {{-- Salário Bruto --}}
            <div>
                <x-input-label for="salarioInput" value="Salário Bruto" class="text-gray-300" />
                <input id="salarioInput" name="salario_bruto" type="text" class="w-full px-4 py-2 rounded bg-gray-600 text-white" readonly>
                <x-input-error :messages="$errors->get('salario_bruto')" class="mt-1" />
            </div>

            {{-- Descontos --}}
            <div>
                <x-input-label for="descontos" value="Descontos" class="text-gray-300" />
                <input id="descontos" name="descontos" type="number" step="0.01" placeholder="Digite os descontos" class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                <x-input-error :messages="$errors->get('descontos')" class="mt-1" />
            </div>

            {{-- Botões --}}
            <div class="flex justify-end mt-4 space-x-3">
                <x-nav-button href="{{ route('folha.index') }}" color="gray">Voltar</x-nav-button>
                <x-primary-button type="submit">Salvar</x-primary-button>
            </div>
        </form>
    </div>

    <script>
        const select = document.getElementById('funcionarioSelect');
        const salarioInput = document.getElementById('salarioInput');

        select.addEventListener('change', function () {
            const salario = select.selectedOptions[0].dataset.salario || 0;
            salarioInput.value = salario;
        });
    </script>
</x-app-layout>
