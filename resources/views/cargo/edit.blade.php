<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cargo - GestorFlex</title>
    <style>
        body { font-family: "Poppins", sans-serif; background: #f3f4f6; padding: 30px; }
        .container { background: white; padding: 20px; border-radius: 12px; max-width: 600px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, select { width: 100%; padding: 10px; margin-top: 10px; border: 1px solid #ccc; border-radius: 6px; }
        button { margin-top: 20px; padding: 10px 16px; background: #28a745; color: white; border: none; border-radius: 6px; cursor: pointer; }
        a { text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
<div class="container">
    <h2>Editar Cargo</h2>

    <form action="{{ route('cargo.update', $cargo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome do Cargo</label>
        <input type="text" name="nome" value="{{ $cargo->nome }}" required>

        <label>Salário Base</label>
        <input type="number" name="salario_base" step="0.01" value="{{ $cargo->salario_base }}" required>

        <label>Nível de Acesso</label>
        <select name="nivel_acesso" required>
            <option value="usuario" {{ $cargo->nivel_acesso == 'usuario' ? 'selected' : '' }}>Usuário</option>
            <option value="admin" {{ $cargo->nivel_acesso == 'admin' ? 'selected' : '' }}>Administrador</option>
        </select>

        <button type="submit">Atualizar</button>
    </form>

    <p><a href="{{ route('cargo.index') }}">← Voltar à lista</a></p>
</div>
</body>
</html>