<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Cargos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<x-app-layout>
    <div>
        <h2>Novo Cargo</h2>

        <form action="{{ route('cargos.store') }}" method="POST">
            @csrf

            <input name="nome" placeholder="Nome do cargo">

            <input name="salario_base" placeholder="Salário base">

            <input name="nivel_acesso" placeholder="Nível de acesso">

            <button>Salvar</button>
        </form>
    </div>
</x-app-layout>