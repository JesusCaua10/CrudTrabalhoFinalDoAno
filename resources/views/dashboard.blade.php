<x-app-layout>
    <div class="p-6">

        <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-10">
            <x-stats-card title="Cargos" :count="App\Models\Cargo::count()" color="blue" />
            <x-stats-card title="Funcionários" :count="App\Models\Funcionario::count()" color="green" />
            <x-stats-card title="Folhas Registradas" :count="App\Models\FolhaDePaga::count()" color="purple" />
            <x-stats-card title="Departamentos" :count="App\Models\Departamento::count()" color="orange" />
            <x-stats-card title="Férias" :count="App\Models\Ferias::count()" color="yellow" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
            <x-shortcut href="{{ route('cargos.index') }}" color="blue">Gerenciar Cargos</x-shortcut>
            <x-shortcut href="{{ route('funcionarios.index') }}" color="green">Funcionários</x-shortcut>
            <x-shortcut href="{{ route('folha.index') }}" color="purple">Folha de Pagamento</x-shortcut>
            <x-shortcut href="{{ route('departamentos.index') }}" color="orange">Departamentos</x-shortcut>
            <x-shortcut href="{{ route('ferias.index') }}" color="yellow">Férias</x-shortcut>
        </div>

    </div>
</x-app-layout>
