<x-app-layout>
<div class="p-6">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Férias</h1>
        <x-primary-button href="{{ route('ferias.create') }}">Nova</x-primary-button>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2">Funcionário</th>
                <th class="p-2">Início</th>
                <th class="p-2">Fim</th>
                <th class="p-2">Dias</th>
                <th class="p-2">Status</th>
                <th class="p-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ferias as $f)
                <tr class="border-b">
                    <td class="p-2">{{ $f->funcionario->nome }}</td>
                    <td class="p-2">{{ $f->data_inicio }}</td>
                    <td class="p-2">{{ $f->data_fim }}</td>
                    <td class="p-2">{{ $f->dias }}</td>
                    <td class="p-2">{{ $f->status }}</td>
                    <td class="p-2 flex gap-2">
                        <a href="{{ route('ferias.edit', $f) }}" class="text-blue-600">Editar</a>
                        <form method="POST" action="{{ route('ferias.destroy', $f) }}"
                            onsubmit="return confirm('Excluir?')">
                            @csrf @method('DELETE')
                            <x-danger-button>Excluir</x-danger-button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $ferias->links() }}
    </div>

</div>
</x-app-layout>
