<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Folha de Pagamento</h2>
    </x-slot>

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <x-nav-button href="{{ route('folha.create') }}" color="blue">
                + Nova Folha
            </x-nav-button>
        </div>

        <x-card>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Funcionário</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Data de Pagamento</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Bruto</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Descontos</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Líquido</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="bg-gray-900 divide-y divide-gray-700">
                        @foreach ($folhas as $f)
                            <tr>
                                <td class="px-6 py-4 text-gray-100">{{ $f->funcionario->nome ?? '-' }}</td>
                                <td class="px-6 py-4 text-gray-100">
                                    {{ \Carbon\Carbon::parse($f->data_pagamento)->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 text-gray-100">
                                    R$ {{ number_format($f->salario_bruto,2,',','.') }}
                                </td>
                                <td class="px-6 py-4 text-gray-100">
                                    R$ {{ number_format($f->descontos,2,',','.') }}
                                </td>
                                <td class="px-6 py-4 text-gray-100">
                                    R$ {{ number_format($f->salario_liquido,2,',','.') }}
                                </td>

                                <td class="px-6 py-4 flex space-x-2">
                                    <x-nav-button href="{{ route('folha.edit', $f) }}" color="green">
                                        Editar
                                    </x-nav-button>

                                    <form action="{{ route('folha.destroy', $f) }}" method="POST"
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

            @if($folhas->isEmpty())
                <p class="text-gray-400 mt-4">Nenhuma folha cadastrada.</p>
            @endif
        </x-card>

    </div>
</x-app-layout>
