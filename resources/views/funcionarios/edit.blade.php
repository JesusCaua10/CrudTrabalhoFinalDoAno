<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Editar Funcionário</h2>
    </x-slot>

    <div class="p-6 max-w-lg mx-auto">
        <form action="{{ route('funcionarios.update', $funcionario) }}" method="POST" class="space-y-4 bg-gray-800 p-6 rounded-xl shadow">
            @csrf
            @method('PUT')
            <input name="nome" value="{{ $funcionario->nome }}" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
            <input name="email" type="email" value="{{ $funcionario->email }}" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>

            <select name="cargo_id" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}" {{ $funcionario->cargo_id == $cargo->id ? 'selected' : '' }}>{{ $cargo->nome }}</option>
                @endforeach
            </select>

            <select name="departamento_id" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                @foreach($departamentos as $d)
                    <option value="{{ $d->id }}" {{ $funcionario->departamento_id == $d->id ? 'selected' : '' }}>{{ $d->nome }}</option>
                @endforeach
            </select>

            <input id="salario_display" value="{{ $funcionario->salario }}" readonly class="w-full px-4 py-2 rounded bg-gray-600 text-white">

            <div class="flex justify-end mt-4">
                <x-nav-button href="{{ route('funcionarios.index') }}" color="gray">Voltar</x-nav-button>
                <x-primary-button type="submit">Atualizar</x-primary-button>
            </div>
        </form>
    </div>

    <script>
        document.querySelector('select[name="cargo_id"]').addEventListener('change', function() {
            const salario = this.options[this.selectedIndex].dataset.salario;
            document.getElementById('salario_display').value = salario ? 'R$ ' + salario : '';
        });
    </script>
</x-app-layout>
