<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Folhas de Pagamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Lista de Funcionários</h2>

        <a href="{{ route('funcionario.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Adicionar Funcionário</a>

        <table class="min-w-full border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nome</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Cargo</th>
                    <th class="px-4 py-2 border">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($funcionarios as $funcionario)
                <tr>
                    <td class="px-4 py-2 border">{{ $funcionario->id }}</td>
                    <td class="px-4 py-2 border">{{ $funcionario->nome }}</td>
                    <td class="px-4 py-2 border">{{ $funcionario->email }}</td>
                    <td class="px-4 py-2 border">{{ $funcionario->cargo->nome ?? '' }}</td>
                    <td class="px-4 py-2 border space-x-2">
                        <a href="{{ route('funcionario.edit', $funcionario->id) }}" class="bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500">Editar</a>
                        <form action="{{ route('funcionario.destroy', $funcionario->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 px-2 py-1 rounded text-white hover:bg-red-600">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>