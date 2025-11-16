<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Cargos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<x-app-layout>
    <div>
        <h2>Editar Cargo</h2>

        <form action="{{ route('cargos.update', $cargo) }}" method="POST">
            @csrf
            @method('PUT')

            <input name="nome" value="{{ $cargo->nome }}">

            <input name="salario_base" value="{{ $cargo->salario_base }}">

            <input name="nivel_acesso" value="{{ $cargo->nivel_acesso }}">

            <button>Atualizar</button>
        </form>
    </div>
</x-app-layout>
