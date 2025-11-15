<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Novo Departamento
        </h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('departamentos.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-semibold mb-1">Nome</label>
                <input
                    type="text"
                    name="nome"
                    class="w-full border rounded p-2"
                    required
                >
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-green-700">Salvar</button>
        </form>
    </div>
</x-app-layout>