<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Cargo - GestorFlex</title>
    <style>
        body { font-family: "Poppins", sans-serif; background: #f3f4f6; padding: 30px; }
        .container { background: white; padding: 20px; border-radius: 12px; max-width: 600px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        p { margin: 10px 0; }
        span { font-weight: bold; }
        a { text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
<div class="container">
    <h2>Detalhes do Cargo</h2>

    <p><span>ID:</span> {{ $cargo->id }}</p>
    <p><span>Nome:</span> {{ $cargo->nome }}</p>
    <p><span>Salário Base:</span> R$ {{ number_format($cargo->salario_base, 2, ',', '.') }}</p>
    <p><span>Nível de Acesso:</span> {{ ucfirst($cargo->nivel_acesso) }}</p>

    <p><a href="{{ route('cargo.index') }}">← Voltar à lista</a></p>
</div>
</body>
</html>