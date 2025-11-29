<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Nova Folha de Pagamento</h2>
    </x-slot>

    <div class="p-6 max-w-lg mx-auto">
        <form action="{{ route('folha.store') }}" method="POST" class="space-y-4 bg-gray-800 p-6 rounded-xl shadow">
            @csrf

            {{-- Funcionário --}}
            <div>
                <x-input-label for="funcionario_id" value="Funcionário" />
                <select id="funcionario_id" name="funcionario_id" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                    <option value="">Selecione o funcionário</option>
                    @foreach ($funcionarios as $f)
                        <option value="{{ $f->id }}" data-salario="{{ $f->cargo->salario_base ?? 0 }}">
                            {{ $f->nome }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('funcionario_id')" />
            </div>

            {{-- Data de Pagamento --}}
            <div>
                <x-input-label for="data_pagamento" value="Data de Pagamento" />
                <x-text-input id="data_pagamento" name="data_pagamento" type="date" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required />
                <x-input-error :messages="$errors->get('data_pagamento')" />
            </div>

            {{-- Salário Bruto --}}
            <div>
                <x-input-label for="salario_bruto" value="Salário Bruto" />
                <x-text-input id="salario_bruto" name="salario_bruto" type="text" readonly class="w-full px-4 py-2 rounded bg-gray-600 text-white" />
                <x-input-error :messages="$errors->get('salario_bruto')" />
            </div>

            {{-- Descontos --}}
            <div>
                <x-input-label for="descontos" value="Descontos" />
                <x-text-input id="descontos" name="descontos" type="number" step="0.01" placeholder="Digite os descontos" class="w-full px-4 py-2 rounded bg-gray-700 text-white" />
                <x-input-error :messages="$errors->get('descontos')" />
            </div>

            {{-- Botões --}}
            <div class="flex justify-end mt-4 space-x-3">
                <x-nav-button href="{{ route('folha.index') }}" color="gray">Voltar</x-nav-button>
                <x-primary-button type="submit">Salvar</x-primary-button>
            </div>
        </form>
    </div>

    <script>
        const funcionarioSelect = document.getElementById('funcionario_id');
        const salarioInput = document.getElementById('salario_bruto');

        funcionarioSelect.addEventListener('change', function () {
            const salario = funcionarioSelect.selectedOptions[0].dataset.salario || 0;
            salarioInput.value = salario;
        });
    </script>
</x-app-layout>
