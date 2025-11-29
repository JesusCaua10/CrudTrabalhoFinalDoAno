<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Novo Funcionário</h2>
    </x-slot>

    <div class="p-6 max-w-lg mx-auto">
        <form action="{{ route('funcionarios.store') }}" method="POST" class="space-y-4 bg-gray-800 p-6 rounded-xl shadow">
            @csrf

            <input name="nome" placeholder="Nome completo" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
            <input name="email" type="email" placeholder="Email" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
            <input name="data_admissao" type="date" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>

            <select name="cargo_id" id="cargoSelect" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                <option value="">Selecione o cargo</option>
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}" data-salario="{{ $cargo->salario_base }}">
                        {{ $cargo->nome }}
                    </option>
                @endforeach
            </select>

            <select name="departamento_id" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                <option value="">Selecione o departamento</option>
                @foreach($departamentos as $d)
                    <option value="{{ $d->id }}">{{ $d->nome }}</option>
                @endforeach
            </select>

            <input id="salario_display" placeholder="Salário do cargo" readonly class="w-full px-4 py-2 rounded bg-gray-600 text-white">

            <div class="flex justify-end mt-4">
                <x-nav-button href="{{ route('funcionarios.index') }}" color="gray">Voltar</x-nav-button>
                <x-primary-button type="submit">Salvar</x-primary-button>
            </div>
        </form>
    </div>

    <script>
        const cargoSelect = document.getElementById('cargoSelect');
        const salarioDisplay = document.getElementById('salario_display');

        cargoSelect.addEventListener('change', function() {
            const salario = this.options[this.selectedIndex].dataset.salario || 0;
            salarioDisplay.value = salario ? 'R$ ' + salario : '';
        });
    </script>
</x-app-layout>
