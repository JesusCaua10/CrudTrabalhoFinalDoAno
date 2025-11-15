<x-app-layout>
<div class="p-6 max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Novo Funcionário</h2>

    <form action="{{ route('funcionarios.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded-xl shadow">
        @csrf

        <input name="nome" placeholder="Nome completo" 
               class="w-full border p-3 rounded-lg" required>

        <input name="email" type="email" placeholder="Email" 
               class="w-full border p-3 rounded-lg" required>

        <!-- CARGO -->
        <select name="cargo_id" id="cargo_id" 
                class="w-full border p-3 rounded-lg" required>
            <option value="">Selecione o cargo</option>
            @foreach ($cargos as $cargo)
                <option value="{{ $cargo->id }}" data-salario="{{ $cargo->salario_base }}">
                    {{ $cargo->nome }}
                </option>
            @endforeach
        </select>

        <!-- DEPARTAMENTO -->
        <select name="departamento_id" class="w-full border p-3 rounded-lg" required>
            <option value="">Selecione o departamento</option>
            @foreach($departamentos as $d)
                <option value="{{ $d->id }}">{{ $d->nome }}</option>
            @endforeach
        </select>

        <input id="salario_display" placeholder="Salário do cargo" 
               class="w-full border p-3 rounded-lg bg-gray-100" readonly>

        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg w-full shadow">
            Salvar
        </button>
    </form>
</div>

<script>
document.getElementById('cargo_id').addEventListener('change', function() {
    const salario = this.options[this.selectedIndex].getAttribute('data-salario');
    document.getElementById('salario_display').value = salario ? 'R$ ' + salario : '';
});
</script>
</x-app-layout>