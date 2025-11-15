<x-app-layout>
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Funcionários</h1>

        <a href="{{ route('funcionarios.create') }}" 
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
            + Novo Funcionário
        </a>

        <div class="overflow-x-auto mt-6">
            <table class="w-full border rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-100 border-b text-gray-700">
                        <th class="p-3 text-left">Nome</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Cargo</th>
                        <th class="p-3 text-left">Departamento</th>
                        <th class="p-3 text-left">Salário</th>
                        <th class="p-3 text-left">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funcionarios as $f)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $f->nome }}</td>
                        <td class="p-3">{{ $f->email }}</td>
                        <td class="p-3">{{ $f->cargo->nome ?? '-' }}</td>
                        <td class="p-3">{{ $f->departamento->nome ?? '-' }}</td>
                        <td class="p-3">R$ {{ number_format($f->salario, 2, ',', '.') }}</td>
                        <td class="p-3 space-x-2">
                            <a href="{{ route('funcionarios.edit', $f) }}" class="text-blue-600 font-medium hover:underline">
                                Editar
                            </a>

                            <form action="{{ route('funcionarios.destroy', $f) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="text-red-600 font-medium hover:underline">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>