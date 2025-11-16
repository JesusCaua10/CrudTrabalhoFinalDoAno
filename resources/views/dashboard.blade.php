<x-app-layout>
    <div class="p-6">

        {{-- Cards de resumo --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <x-card title="Cargos" :count="\App\Models\Cargo::count()" color="blue" />
            <x-card title="Funcionários" :count="\App\Models\Funcionario::count()" color="green" />
            <x-card title="Folhas Registradas" :count="\App\Models\FolhaDePaga::count()" color="purple" />
            <x-card title="Departamentos" :count="\App\Models\Departamento::count()" color="orange" />
        </div>

        {{-- Atalhos --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <x-shortcut href="{{ route('cargos.index') }}" color="blue">📋 Gerenciar Cargos</x-shortcut>
            <x-shortcut href="{{ route('funcionarios.index') }}" color="green">👨‍💼 Funcionários</x-shortcut>
            <x-shortcut href="{{ route('folha.index') }}" color="purple">💰 Folha de Pagamento</x-shortcut>
            <x-shortcut href="{{ route('departamentos.index') }}" color="orange">🏢 Departamentos</x-shortcut>
        </div>
    </div>
</x-app-layout>