<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Departamentos</h2>
    </x-slot>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <x-nav-button href="{{ route('departamentos.create') }}" color="blue">+ Novo Departamento</x-nav-button>
        </div>

        <x-card>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Nome</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300 w-40">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="bg-gray-900 divide-y divide-gray-700">
                        @foreach ($departamentos as $d)
                            <tr>
                                <td class="px-6 py-4 text-gray-100">{{ $d->nome }}</td>

                                <td class="px-6 py-4 flex space-x-2">
                                    <x-nav-button href="{{ route('departamentos.edit', $d) }}" color="green">
                                        Editar
                                    </x-nav-button>

                                    <form action="{{ route('departamentos.destroy', $d) }}" method="POST"
                                          onsubmit="return confirm('Deseja realmente excluir?')">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button type="submit">Excluir</x-danger-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($departamentos->isEmpty())
                <p class="text-gray-400 mt-4">Nenhum departamento cadastrado.</p>
            @endif
        </x-card>

    </div>
</x-app-layout>
