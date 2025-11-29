<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Editar Departamento</h2>
    </x-slot>

    <div class="p-6 max-w-lg mx-auto">
        <form action="{{ route('departamentos.update', $departamento) }}" method="POST" class="space-y-4 bg-gray-800 p-6 rounded-xl shadow">
            @csrf
            @method('PUT')

            <input name="nome" value="{{ $departamento->nome }}"
                class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>

            <div class="flex justify-end mt-4">
                <x-nav-button href="{{ route('departamentos.index') }}" color="gray">Voltar</x-nav-button>
                <x-primary-button type="submit">Atualizar</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
