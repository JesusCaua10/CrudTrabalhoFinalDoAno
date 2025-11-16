<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Departamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<x-app-layout>
    <x-slot name="header">
        <h2>
            Novo Departamento
        </h2>
    </x-slot>

    <div>
        <form action="{{ route('departamentos.store') }}" method="POST">
            @csrf

            <div>
                <label>Nome</label>
                <input
                    type="text"
                    name="nome"
                    required
                >
            </div>

            <button type="submit">Salvar</button>
        </form>
    </div>
</x-app-layout>

</body>
</html>