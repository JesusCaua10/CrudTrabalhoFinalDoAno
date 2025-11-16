<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cargos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<x-app-layout>
    <div>
        <h1>Cargos</h1>

        <a href="{{ route('cargos.create') }}">+ Novo Cargo</a>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Salário Base</th>
                    <th>Nível de Acesso</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($cargos as $cargo)
                    <tr>
                        <td>{{ $cargo->nome }}</td>
                        <td>R$ {{ number_format($cargo->salario_base, 2, ',', '.') }}</td>
                        <td>{{ $cargo->nivel_acesso }}</td>

                        <td>
                            <a href="{{ route('cargos.edit', $cargo) }}">Editar</a>

                            <form action="{{ route('cargos.destroy', $cargo) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>