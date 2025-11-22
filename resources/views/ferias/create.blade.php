<x-app-layout>
<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">Registrar Férias</h1>

    <form method="POST" action="{{ route('ferias.store') }}">
        @csrf

        <div class="mb-4">
            <x-input-label for="funcionario_id" value="Funcionário" />
            <select name="funcionario_id" id="funcionario_id" class="w-full border-gray-300 rounded-md">
                @foreach($funcionarios as $func)
                    <option value="{{ $func->id }}">{{ $func->nome }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('funcionario_id')" />
        </div>

        <div class="mb-4">
            <x-input-label for="data_inicio" value="Data de Início" />
            <x-text-input type="date" name="data_inicio" class="w-full" />
            <x-input-error :messages="$errors->get('data_inicio')" />
        </div>

        <div class="mb-4">
            <x-input-label for="data_fim" value="Data de Fim" />
            <x-text-input type="date" name="data_fim" class="w-full" />
            <x-input-error :messages="$errors->get('data_fim')" />
        </div>

        <x-primary-button>Salvar</x-primary-button>
        <a href="{{ route('ferias.index') }}" class="ml-2">
            <x-secondary-button>Voltar</x-secondary-button>
        </a>
    </form>

</div>
</x-app-layout>
