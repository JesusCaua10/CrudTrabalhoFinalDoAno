<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Novo Funcionário</h2>
    </x-slot>

    <div class="p-6 max-w-lg mx-auto">
        <form action="{{ route('funcionarios.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded-xl shadow">
            @csrf
            <x-input name="nome" placeholder="Nome completo" />
            <x-input name="email" type="email" placeholder="Email" />

            <x-select name="cargo_id" id="cargo_id">
                <option value="">Selecione o cargo</option>
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}" data-salario="{{ $cargo->salario_base }}">{{ $cargo->nome }}</option>
                @endforeach
            </x-select>

            <x-select name="departamento_id">
                <option value="">Selecione o departamento</option>
                @foreach($departamentos as $d)
                    <option value="{{ $d->id }}">{{ $d->nome }}</option>
                @endforeach
            </x-select>

            <x-input id="salario_display" placeholder="Salário do cargo" readonly />

            <x-button color="blue" full="true">Salvar</x-button>
        </form>
    </div>

    <script>
        document.getElementById('cargo_id').addEventListener('change', function() {
            const salario = this.options[this.selectedIndex].getAttribute('data-salario');
            document.getElementById('salario_display').value = salario ? 'R$ ' + salario : '';
        });
    </script>
</x-app-layout>