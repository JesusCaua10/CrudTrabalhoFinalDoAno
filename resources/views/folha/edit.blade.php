<x-app-layout>
    <div class="p-6 max-w-lg mx-auto">
        <h2 class="text-2xl font-bold text-white mb-6">Editar Folha de Pagamento</h2>

        <form action="{{ route('folha.update', $folha) }}" method="POST" class="space-y-4 bg-gray-800 p-6 rounded-xl shadow">
            @csrf
            @method('PUT')

            {{-- Funcionário --}}
            <div>
                <x-input-label for="funcionarioSelectEdit" value="Funcionário" class="text-gray-300" />
                <select id="funcionarioSelectEdit" name="funcionario_id" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                    @foreach ($funcionarios as $f)
                        <option value="{{ $f->id }}" data-salario="{{ $f->salario }}" @selected($f->id == $folha->funcionario_id)>
                            {{ $f->nome }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('funcionario_id')" class="mt-1" />
            </div>

            {{-- Data de Pagamento --}}
            <div>
                <x-input-label for="data_pagamento" value="Data de Pagamento" class="text-gray-300" />
                <input id="data_pagamento" name="data_pagamento" type="date" value="{{ $folha->data_pagamento }}" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                <x-input-error :messages="$errors->get('data_pagamento')" class="mt-1" />
            </div>

            {{-- Salário Bruto --}}
            <div>
                <x-input-label for="salarioInputEdit" value="Salário Bruto" class="text-gray-300" />
                <input id="salarioInputEdit" name="salario_bruto" type="text" value="{{ $folha->salario_bruto }}" readonly class="w-full px-4 py-2 rounded bg-gray-600 text-white">
                <x-input-error :messages="$errors->get('salario_bruto')" class="mt-1" />
            </div>

            {{-- Descontos --}}
            <div>
                <x-input-label for="descontos" value="Descontos" class="text-gray-300" />
                <input id="descontos" name="descontos" type="number" step="0.01" value="{{ $folha->descontos }}" class="w-full px-4 py-2 rounded bg-gray-700 text-white">
                <x-input-error :messages="$errors->get('descontos')" class="mt-1" />
            </div>

            {{-- Botões --}}
            <div class="flex justify-end mt-4 space-x-3">
                <x-nav-button href="{{ route('folha.index') }}" color="gray">Voltar</x-nav-button>
                <x-primary-button type="submit">Atualizar</x-primary-button>
            </div>
        </form>
    </div>

    <script>
        const selectEdit = document.getElementById('funcionarioSelectEdit');
        const salarioInputEdit = document.getElementById('salarioInputEdit');

        selectEdit.addEventListener('change', function () {
            const salario = selectEdit.selectedOptions[0].dataset.salario || 0;
            salarioInputEdit.value = salario;
        });
    </script>
</x-app-layout>
