<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Departamentos</h2>
    </x-slot>

    <div class="p-6">
        <div class="flex justify-between mb-6">
            <h3 class="text-lg font-medium text-white">Lista de Departamentos</h3>
            <x-button-link href="{{ route('departamentos.create') }}" color="blue">+ Novo Departamento</x-button-link>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700 text-gray-200">
                <thead>
                    <tr class="text-left text-gray-300">
                        <th class="px-4 py-2">Nome</th>
                        <th class="px-4 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach ($departamentos as $d)
                        <tr>
                            <td class="px-4 py-2">{{ $d->nome }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <x-button-link href="{{ route('departamentos.edit', $d) }}" color="yellow">Editar</x-button-link>
                                <form action="{{ route('departamentos.destroy', $d) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir?')">
                                    @csrf
                                    @method('DELETE')
                                    <x-button type="submit" color="red">Excluir</x-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
