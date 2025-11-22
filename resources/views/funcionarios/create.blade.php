<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Novo Funcionário</h2>
    </x-slot>

    <div class="p-6 max-w-lg mx-auto">
        <form action="{{ route('funcionarios.store') }}" method="POST" class="space-y-4 bg-gray-800 p-6 rounded-xl shadow">
            @csrf
            <input name="nome" placeholder="Nome completo" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
            <input name="email" type="email" placeholder="Email" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>

            <select name="cargo_id" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                <option value="">Selecione o cargo</option>
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}" data-salario="{{ $cargo->salario_base }}">{{ $cargo->nome }}</option>
                @endforeach
            </select>

            <select name="departamento_id" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                <option value="">Selecione o departamento</option>
                @foreach($departamentos as $d)
                    <option value="{{ $d->id }}">{{ $d->nome }}</option>
                @endforeach
            </select>

            <input id="salario_display" placeholder="Salário do cargo" readonly class="w-full px-4 py-2 rounded bg-gray-600 text-white">

            <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">Salvar</button>
        </form>
    </div>

    <script>
        document.querySelector('select[name="cargo_id"]').addEventListener('change', function() {
            const salario = this.options[this.selectedIndex].dataset.salario;
            document.getElementById('salario_display').value = salario ? 'R$ ' + salario : '';
        });
    </script>
</x-app-layout>
