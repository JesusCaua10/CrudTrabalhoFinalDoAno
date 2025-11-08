<x-app-layout>
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Painel GestorFlex</h1>

        {{-- Cards de resumo --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-white shadow rounded-xl p-4 border">
                <h2 class="text-lg font-semibold text-gray-700">Cargos</h2>
                <p class="text-2xl font-bold text-blue-600 mt-2">{{ \App\Models\Cargo::count() }}</p>
            </div>
            <div class="bg-white shadow rounded-xl p-4 border">
                <h2 class="text-lg font-semibold text-gray-700">Funcionários</h2>
                <p class="text-2xl font-bold text-green-600 mt-2">{{ \App\Models\Funcionario::count() }}</p>
            </div>
            <div class="bg-white shadow rounded-xl p-4 border">
                <h2 class="text-lg font-semibold text-gray-700">Folhas Registradas</h2>
                <p class="text-2xl font-bold text-purple-600 mt-2">{{ \App\Models\FolhaDePaga::count() }}</p>
            </div>
        </div>

        {{-- Atalhos --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('cargos.index') }}" class="block bg-blue-600 hover:bg-blue-700 text-white rounded-xl p-4 text-center font-semibold transition">📋 Gerenciar Cargos</a>
            <a href="{{ route('funcionarios.index') }}" class="block bg-green-600 hover:bg-green-700 text-black rounded-xl p-4 text-center font-semibold transition">👨‍💼 Funcionários</a>
            <a href="{{ route('folha.index') }}" class="block bg-purple-600 hover:bg-purple-700 text-black rounded-xl p-4 text-center font-semibold transition">💰 Folha de Pagamento</a>
        </div>
    </div>
</x-app-layout>