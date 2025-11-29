<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Novo Cargo</h2>
    </x-slot>

    <div class="p-6 max-w-lg mx-auto">
        <form action="{{ route('cargos.store') }}" method="POST" class="space-y-4 bg-gray-800 p-6 rounded-xl shadow">
            @csrf

            <input name="nome" value="{{ old('nome') }}" placeholder="Nome do cargo" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>

            <input name="salario_base" type="number" step="0.01"value="{{ old('salario_base') }}" placeholder="Salário base" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>

            <input name="nivel_acesso" value="{{ old('nivel_acesso') }}" placeholder="Nível de acesso" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>

            <div class="flex justify-end mt-4">
                <x-nav-button href="{{ route('cargos.index') }}" color="gray">Voltar</x-nav-button>
                <x-primary-button type="submit">Salvar</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
