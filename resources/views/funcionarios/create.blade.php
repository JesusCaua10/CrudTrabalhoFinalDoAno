<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Funcionario</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <h1>Novo Funcionario</h1>

    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('funcionario.store') }}" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="Nome do funcionario" value="{{ old('nome') }}">
        <input type="email" name="email" placeholder="Email do funcionario" value="{{   old('email') }}">
        <input type="number" name="cargo_id" placeholder="ID do Cargo" value="{{ old('cargo_id') }}">
        <input type="date" name="data_admissao" placeholder="Data de Admissão" value="{{ old('data_admissao') }}">
        <button type="submit">Criar</button>
    </form>
    <a href="{{ route('funcionario.index') }}" class="button">Voltar</a>
</div>
</body>
</html>