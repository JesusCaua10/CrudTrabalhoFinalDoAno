<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionário</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<x-app-layout>

    <div>
        <h2>Editar Funcionário</h2>

        <form action="{{ route('funcionarios.update', $funcionario) }}" method="POST">
            @csrf
            @method('PUT')

            <input name="nome" value="{{ $funcionario->nome }}" required>

            <input name="email" value="{{ $funcionario->email }}" required>

            <!-- CARGO -->
            <select name="cargo_id" id="cargo_id" required>
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}" data-salario="{{ $cargo->salario_base }}"
                        @selected($cargo->id == $funcionario->cargo_id)>
                        {{ $cargo->nome }}
                    </option>
                @endforeach
            </select>

            <!-- DEPARTAMENTO -->
            <select name="departamento_id" required>
                @foreach ($departamentos as $d)
                    <option value="{{ $d->id }}" @selected($d->id == $funcionario->departamento_id)>
                        {{ $d->nome }}
                    </option>
                @endforeach
            </select>

            <input id="salario_display" value="R$ {{ number_format($funcionario->salario, 2, ',', '.') }}" readonly>

            <button>Atualizar</button>
        </form>
    </div>

    <script>
        document.getElementById('cargo_id').addEventListener('change', function() {
            const salario = this.options[this.selectedIndex].getAttribute('data-salario');
            document.getElementById('salario_display').value = salario ? 'R$ ' + salario : '';
        });
    </script>

</x-app-layout>
</body>
</html>