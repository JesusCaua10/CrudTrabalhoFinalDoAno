<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Novo Departamento</h2>
    </x-slot>

    <div class="p-6 max-w-lg mx-auto">
        <form action="{{ route('departamentos.store') }}" method="POST" class="space-y-4 bg-gray-800 p-6 rounded-xl shadow">
            @csrf
            <x-input name="nome" placeholder="Nome do departamento" required />

            <x-button type="submit" color="blue" full="true">Salvar</x-button>
        </form>
    </div>
</x-app-layout>
