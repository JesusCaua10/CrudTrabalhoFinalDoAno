<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Cargos</h2>
    </x-slot>
    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <x-nav-button href="{{ route('cargos.create') }}" color="blue">
                Novo Cargo
            </x-nav-button>
        </div>

        <x-card>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Nome</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Salário Base</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Nível de Acesso</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-900 divide-y divide-gray-700">
                        @foreach ($cargos as $cargo)
                            <tr>
                                <td class="px-6 py-4 text-gray-100">{{ $cargo->nome }}</td>
                                <td class="px-6 py-4 text-gray-100">R$ {{ number_format($cargo->salario_base, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 text-gray-100">{{ $cargo->nivel_acesso }}</td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <x-nav-button href="{{ route('cargos.edit', $cargo) }}" color="green">
                                        Editar
                                    </x-nav-button>
                                    <form action="{{ route('cargos.destroy', $cargo) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
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

            @if($cargos->isEmpty())
                <p class="text-gray-400 mt-4">Nenhum cargo cadastrado.</p>
            @endif
        </x-card>

    </div>
</x-app-layout>
