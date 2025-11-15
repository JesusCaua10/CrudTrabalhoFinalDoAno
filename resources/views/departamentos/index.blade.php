<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Departamentos
        </h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('departamentos.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Novo Departamento
        </a>

        <table class="w-full mt-4 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">ID</th>
                    <th class="p-2 border">Nome</th>
                    <th class="p-2 border">Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($departamentos as $departamento)
                    <tr>
                        <td class="p-2 border">{{ $departamento->id }}</td>
                        <td class="p-2 border">{{ $departamento->nome }}</td>
                        <td class="p-2 border">
                            <a href="{{ route('departamentos.edit', $departamento->id) }}"
                               class="bg-yellow-500 text-white px-2 py-1 rounded">
                                Editar
                            </a>

                            <form action="{{ route('departamentos.destroy', $departamento->id) }}"
                                  method="POST"
                                  style="display:inline-block">
                                @csrf
                                @method('DELETE')

                                <button class="bg-red-600 text-white px-2 py-1 rounded"
                                        onclick="return confirm('Deseja apagar?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</x-app-layout>