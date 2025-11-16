<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Funcionários</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

<x-app-layout>

    <div>
        <h1>Funcionários</h1>

        <a href="{{ route('funcionarios.create') }}">
            + Novo Funcionário
        </a>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Cargo</th>
                        <th>Departamento</th>
                        <th>Salário</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($funcionarios as $f)
                    <tr>
                        <td>{{ $f->nome }}</td>
                        <td>{{ $f->email }}</td>
                        <td>{{ $f->cargo->nome ?? '-' }}</td>
                        <td>{{ $f->departamento->nome ?? '-' }}</td>
                        <td>R$ {{ number_format($f->salario, 2, ',', '.') }}</td>

                        <td>
                            <a href="{{ route('funcionarios.edit', $f) }}">
                                Editar
                            </a>

                            <form action="{{ route('funcionarios.destroy', $f) }}" method="POST">
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

    </div>

</x-app-layout>

</body>
</html>