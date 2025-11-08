<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Folhas de Pagamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-app-layout>
<div class="p-6 max-w-md mx-auto">
    <h2 class="text-xl font-bold mb-4">Editar Cargo</h2>
    <form action="{{ route('cargos.update', $cargo) }}" method="POST" class="space-y-3">
        @csrf @method('PUT')
        <input name="nome" value="{{ $cargo->nome }}" class="w-full border p-2 rounded">
        <input name="salario_base" value="{{ $cargo->salario_base }}" class="w-full border p-2 rounded">
        <input name="nivel_acesso" value="{{ $cargo->nivel_acesso }}" class="w-full border p-2 rounded">
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Atualizar</button>
    </form>
</div>
</x-app-layout>