<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Folha de Pagamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<x-app-layout>

    <div>
        <h1>Folha de Pagamento</h1>

        <a href="{{ route('folha.create') }}">
            + Nova Folha
        </a>

        <table>
            <thead>
                <tr>
                    <th>Funcionário</th>
                    <th>Data de Pagamento</th>
                    <th>Bruto</th>
                    <th>Descontos</th>
                    <th>Líquido</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($folhas as $f)
                <tr>
                    <td>{{ $f->funcionario->nome ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($f->data_pagamento)->format('d/m/Y') }}</td>
                    <td>R$ {{ number_format($f->salario_bruto,2,',','.') }}</td>
                    <td>R$ {{ number_format($f->descontos,2,',','.') }}</td>
                    <td>R$ {{ number_format($f->salario_liquido,2,',','.') }}</td>

                    <td>
                        <a href="{{ route('folha.edit', $f) }}">
                            Editar
                        </a>

                        <form action="{{ route('folha.destroy', $f) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button>
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
</body>
</html>