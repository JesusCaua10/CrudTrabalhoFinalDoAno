<x-app-layout>
<div class="p-6 max-w-md mx-auto">
    <h2 class="text-xl font-bold mb-4">Novo Funcionário</h2>

    <form action="{{ route('funcionarios.store') }}" method="POST" class="space-y-3">
        @csrf

        <input name="nome" placeholder="Nome completo" class="w-full border p-2 rounded" required>
        <input name="email" type="email" placeholder="Email" class="w-full border p-2 rounded" required>

        <select name="cargo_id" id="cargo_id" class="w-full border p-2 rounded" required>
            <option value="">Selecione o cargo</option>
            @foreach ($cargos as $cargo)
                <option value="{{ $cargo->id }}" data-salario="{{ $cargo->salario_base }}">{{ $cargo->nome }}</option>
            @endforeach
        </select>

        <input id="salario_display" placeholder="Salário do cargo" class="w-full border p-2 rounded bg-gray-100" readonly>

        <button class="bg-blue-600 text-white px-4 py-2 rounded w-full">Salvar</button>
    </form>
</div>

<script>
    document.getElementById('cargo_id').addEventListener('change', function() {
        const salario = this.options[this.selectedIndex].getAttribute('data-salario');
        document.getElementById('salario_display').value = salario ? 'R$ ' + salario : '';
    });
</script>
</x-app-layout>