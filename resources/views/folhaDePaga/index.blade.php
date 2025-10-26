<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folha de Pagamento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 40px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .add-btn {
            background: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }
        .add-btn:hover {
            background: #45a049;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
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
        tr:hover {
            background: #f1f1f1;
        }
        .edit-btn, .delete-btn {
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 6px;
            color: white;
        }
        .edit-btn {
            background: #007bff;
        }
        .edit-btn:hover {
            background: #0056b3;
        }
        .delete-btn {
            background: #dc3545;
        }
        .delete-btn:hover {
            background: #a71d2a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Folha de Pagamento</h1>
        <a href="{{ route('folhadepaga.create') }}" class="add-btn">+ Nova Folha</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Funcionário</th>
                    <th>Salário Bruto</th>
                    <th>Descontos</th>
                    <th>Salário Líquido</th>
                    <th>Data de Pagamento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($folhas as $folha)
                <tr>
                    <td>{{ $folha->id }}</td>
                    <td>{{ $folha->funcionario->nome ?? 'N/A' }}</td>
                    <td>R$ {{ number_format($folha->salario_bruto, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($folha->descontos, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($folha->salario_liquido, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($folha->data_pagamento)->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('folhadepaga.edit', $folha->id) }}" class="edit-btn">Editar</a>
                        <form action="{{ route('folhadepaga.destroy', $folha->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn" onclick="return confirm('Deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>