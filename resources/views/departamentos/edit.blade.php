<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Editar Departamento
        </h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('departamentos.update', $departamento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-semibold">Nome</label>
                <input type="text"
                       name="nome"
                       value="{{ $departamento->nome }}"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Atualizar
            </button>
        </form>
    </div>
</x-app-layout>