<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Funcionários</h2>
    </x-slot>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <x-nav-button href="{{ route('funcionarios.create') }}" color="blue">
                + Novo Funcionário
            </x-nav-button>
        </div>

        <x-card>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Nome</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Cargo</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Departamento</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Salário</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Data de Admissão</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-900 divide-y divide-gray-700">
                        @foreach ($funcionarios as $funcionario)
                            <tr>
                                <td class="px-6 py-4 text-gray-100">{{ $funcionario->nome }}</td>
                                <td class="px-6 py-4 text-gray-100">{{ $funcionario->email }}</td>
                                <td class="px-6 py-4 text-gray-100">{{ $funcionario->cargo->nome ?? '-' }}</td>
                                <td class="px-6 py-4 text-gray-100">{{ $funcionario->departamento->nome ?? '-' }}</td>
                                <td class="px-6 py-4 text-gray-100">
                                    R$ {{ number_format($funcionario->cargo->salario_base ?? $funcionario->salario, 2, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-gray-100">
                                    {{ $funcionario->data_admissao ? \Carbon\Carbon::parse($funcionario->data_admissao)->format('d/m/Y') : '-' }}
                                </td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <x-nav-button href="{{ route('funcionarios.edit', $funcionario) }}" color="green">
                                        Editar
                                    </x-nav-button>
                                    <form action="{{ route('funcionarios.destroy', $funcionario) }}" method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir?')">
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

            @if($funcionarios->isEmpty())
                <p class="text-gray-400 mt-4">Nenhum funcionário registrado.</p>
            @endif
        </x-card>

    </div>
</x-app-layout>
