<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Departamentos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<x-app-layout>
    <x-slot name="header">
        <h2>Departamentos</h2>
    </x-slot>

    <div>

        <a href="{{ route('departamentos.create') }}">
            Novo Departamento
        </a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($departamentos as $departamento)
                    <tr>
                        <td>{{ $departamento->id }}</td>
                        <td>{{ $departamento->nome }}</td>
                        <td>
                            <a href="{{ route('departamentos.edit', $departamento->id) }}">
                                Editar
                            </a>

                            <form action="{{ route('departamentos.destroy', $departamento->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Deseja apagar?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</x-app-layout>