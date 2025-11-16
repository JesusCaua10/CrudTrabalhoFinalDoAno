<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Departamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<x-app-layout>
    <x-slot name="header">
        <h2>Editar Departamento</h2>
    </x-slot>

    <div>
        <form action="{{ route('departamentos.update', $departamento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label>Nome</label>
                <input type="text" name="nome" value="{{ $departamento->nome }}" required>
            </div>

            <button>
                Atualizar
            </button>
        </form>
    </div>
</x-app-layout>