<x-app-layout>
<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">Editar Férias</h1>

    <form method="POST" action="{{ route('ferias.update', $ferias) }}">
        @csrf @method('PUT')

        <div class="mb-4">
            <x-input-label for="funcionario_id" value="Funcionário" />
            <select name="funcionario_id" id="funcionario_id" class="w-full border-gray-300 rounded-md">
                @foreach($funcionarios as $func)
                    <option value="{{ $func->id }}" @selected($func->id == $ferias->funcionario_id)>
                        {{ $func->nome }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('funcionario_id')" />
        </div>

        <div class="mb-4">
            <x-input-label value="Data de Início" />
            <x-text-input type="date" name="data_inicio" value="{{ $ferias->data_inicio }}" class="w-full" />
        </div>

        <div class="mb-4">
            <x-input-label value="Data de Fim" />
            <x-text-input type="date" name="data_fim" value="{{ $ferias->data_fim }}" class="w-full" />
        </div>

        <div class="mb-4">
            <x-input-label value="Status" />
            <select name="status" class="w-full border-gray-300 rounded-md">
                <option value="Pendente" @selected($ferias->status == 'Pendente')>Pendente</option>
                <option value="Aprovada" @selected($ferias->status == 'Aprovada')>Aprovada</option>
                <option value="Rejeitada" @selected($ferias->status == 'Rejeitada')>Rejeitada</option>
            </select>
        </div>

        <x-primary-button>Atualizar</x-primary-button>

    </form>

</div>
</x-app-layout>
