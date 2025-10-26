<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cargo</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <h1>Editar Cargo</h1>

    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cargo.update', $cargo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nome" placeholder="Nome do Cargo" value="{{ old('nome', $cargo->nome) }}">
        <input type="number" step="0.01" name="salario_base" placeholder="Salário Base" value="{{ old('salario_base', $cargo->salario_base) }}">
        <select name="nivel_acesso">
            <option value="usuario" {{ (old('nivel_acesso', $cargo->nivel_acesso)=='usuario')?'selected':'' }}>Usuário</option>
            <option value="admin" {{ (old('nivel_acesso', $cargo->nivel_acesso)=='admin')?'selected':'' }}>Administrador</option>
        </select>
        <button type="submit">Atualizar</button>
    </form>
    <a href="{{ route('cargo.index') }}" class="button">Voltar</a>
</div>
</body>
</html>