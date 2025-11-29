<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Férias</h2>
    </x-slot>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <x-nav-button href="{{ route('ferias.create') }}" color="blue">
                + Nova
            </x-nav-button>
        </div>

        <x-card>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-800">
                        <tr class="text-gray-300 text-left">
                            <th class="px-6 py-3">Funcionário</th>
                            <th class="px-6 py-3">Início</th>
                            <th class="px-6 py-3">Fim</th>
                            <th class="px-6 py-3">Dias</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="bg-gray-900 divide-y divide-gray-700">
                        @foreach ($feria as $f)
                            <tr>
                                <td class="px-6 py-4 text-gray-100">{{ $f->funcionario->nome }}</td>
                                <td class="px-6 py-4 text-gray-100">{{ $f->data_inicio }}</td>
                                <td class="px-6 py-4 text-gray-100">{{ $f->data_fim }}</td>
                                <td class="px-6 py-4 text-gray-100">{{ $f->dias }}</td>
                                <td class="px-6 py-4 text-gray-100">{{ $f->status }}</td>

                                <td class="px-6 py-4 flex space-x-2">

                                    <x-nav-button href="{{ route('ferias.edit', $f) }}" color="green">
                                        Editar
                                    </x-nav-button>

                                    <form action="{{ route('ferias.destroy', $f) }}" method="POST"
                                        onsubmit="return confirm('Deseja realmente excluir?')">
                                        @csrf
                                        @method('DELETE')

                                        <x-danger-button>
                                            Excluir
                                        </x-danger-button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($feria->isEmpty())
                <p class="text-gray-400 mt-4">Nenhum registro de férias cadastrado.</p>
            @endif
        </x-card>

        <div class="mt-4">
            {{ $feria->links() }}
        </div>

    </div>
</x-app-layout>
