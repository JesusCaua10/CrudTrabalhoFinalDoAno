<x-app-layout>
<div class="p-6 max-w-lg mx-auto">

    <h1 class="text-2xl font-bold mb-4 text-white">Editar Férias</h1>

    <form method="POST" action="{{ route('ferias.update', $feria) }}" class="space-y-4 bg-gray-800 p-6 rounded-xl shadow">
        @csrf
        @method('PUT')

        <select name="funcionario_id" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
            @foreach($funcionarios as $func)
                <option value="{{ $func->id }}" @selected($func->id == $feria->funcionario_id)>
                    {{ $func->nome }}
                </option>
            @endforeach
        </select>

        <input type="date" name="data_inicio" value="{{ $feria->data_inicio }}"
            class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>

        <input type="date" name="data_fim" value="{{ $feria->data_fim }}"
            class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>

        <select name="status" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
            <option value="Pendente" @selected($feria->status == 'Pendente')>Pendente</option>
            <option value="Aprovada" @selected($feria->status == 'Aprovada')>Aprovada</option>
            <option value="Rejeitada" @selected($feria->status == 'Rejeitada')>Rejeitada</option>
        </select>

        <div class="flex justify-end mt-4">
            <x-nav-button href="{{ route('ferias.index') }}" color="gray">Voltar</x-nav-button>
            <x-primary-button>Atualizar</x-primary-button>
        </div>
    </form>

</div>
</x-app-layout>
