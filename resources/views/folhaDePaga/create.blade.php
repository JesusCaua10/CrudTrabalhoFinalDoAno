<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Folha de Pagamento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
        }
        button:hover {
            background: #0056b3;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Nova Folha de Pagamento</h2>
    <form action="{{ route('folhadepaga.store') }}" method="POST">
        @csrf
        <label for="funcionario_id">Funcionário</label>
        <select name="funcionario_id" required>
            <option value="">Selecione</option>
            @foreach($funcionarios as $funcionario)
                <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
            @endforeach
        </select>

        <label>Salário Bruto</label>
        <input type="number" name="salario_bruto" step="0.01" required>

        <label>Descontos</label>
        <input type="number" name="descontos" step="0.01" required>

        <label>Data de Pagamento</label>
        <input type="date" name="data_pagamento" required>

        <button type="submit">Salvar</button>
        <a href="{{ route('folhadepaga.index') }}">← Voltar</a>
    </form>
</div>
</body>
</html>