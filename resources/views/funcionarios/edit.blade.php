<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionario</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <h1>Editar Funcionario</h1>

    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('funcionario.update', $funcionario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nome" placeholder="Nome do funcionario" value="{{ old('nome', $funcionario->nome) }}">
        <input type="email" name="email" placeholder="Email do funcionario" value="{{ old('email', $funcionario->email) }}">
        <input type="number" name="cargo_id" placeholder="ID do Cargo" value="{{ old('cargo_id', $funcionario->cargo_id) }}">
        <input type="date" name="data_admissao" placeholder="Data de Admissão" value="{{ old('data_admissao', $funcionario->data_admissao) }}">
        <button type="submit">Atualizar</button>
    </form>
    <a href="{{ route('funcionario.index') }}" class="button">Voltar</a>
</div>
</body>
</html>