<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folha de Pagamento - GestorFlex</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #f3f4f6;
            padding: 30px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 12px;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #007bff;
            color: white;
        }
        a.btn {
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 6px;
            color: white;
        }
        .btn-add { background: #28a745; }
        .btn-edit { background: #ffc107; color: black; }
        .btn-del { background: #dc3545; }
    </style>
</head>
<body>
<div class="container">
    <h2>Lista de Pagamentos</h2>

    <a href="{{ route('cargo.create') }}" class="btn btn-add">+ Nova Folha</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Salário Base</th>
                <th>Nível de Acesso</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cargos as $cargo)
                <tr>
                    <td>{{ $cargo->id }}</td>
                    <td>{{ $cargo->nome }}</td>
                    <td>R$ {{ number_format($cargo->salario_base, 2, ',', '.') }}</td>
                    <td>{{ ucfirst($cargo->nivel_acesso) }}</td>
                    <td>
                        <a href="{{ route('cargo.show', $cargo->id) }}" class="btn btn-add">Ver</a>
                        <a href="{{ route('cargo.edit', $cargo->id) }}" class="btn btn-edit">Editar</a>
                        <form action="{{ route('cargo.destroy', $cargo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-del" onclick="return confirm('Excluir este cargo?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>