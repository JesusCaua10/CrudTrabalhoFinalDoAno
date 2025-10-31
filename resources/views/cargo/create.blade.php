<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Folhas de Pagamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Criar Cargo</h2>

        <form action="{{ route('cargo.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-medium">Nome</label>
                <input type="text" name="nome" value="{{ old('nome') }}" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                @error('nome')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block mb-1 font-medium">Salário</label>
                <input type="number" step="0.01" name="salario" value="{{ old('salario') }}" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                @error('salario')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex justify-between items-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Salvar</button>
                <a href="{{ route('cargo.index') }}" class="text-gray-500 hover:underline">← Voltar</a>
            </div>
        </form>
    </div>
</div>