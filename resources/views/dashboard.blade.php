<x-app-layout>
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Painel GestorFlex</h1>

        {{-- Cards de resumo --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

            {{-- Cargos --}}
            <div class="bg-white shadow-md rounded-xl p-6 border">
                <h2 class="text-lg font-semibold text-gray-700">Cargos</h2>
                <p class="text-3xl font-extrabold text-blue-600 mt-2">
                    {{ \App\Models\Cargo::count() }}
                </p>
            </div>

            {{-- Funcionários --}}
            <div class="bg-white shadow-md rounded-xl p-6 border">
                <h2 class="text-lg font-semibold text-gray-700">Funcionários</h2>
                <p class="text-3xl font-extrabold text-green-600 mt-2">
                    {{ \App\Models\Funcionario::count() }}
                </p>
            </div>

            {{-- Folhas --}}
            <div class="bg-white shadow-md rounded-xl p-6 border">
                <h2 class="text-lg font-semibold text-gray-700">Folhas Registradas</h2>
                <p class="text-3xl font-extrabold text-purple-600 mt-2">
                    {{ \App\Models\FolhaDePaga::count() }}
                </p>
            </div>

            {{-- Departamentos (novo) --}}
            <div class="bg-white shadow-md rounded-xl p-6 border">
                <h2 class="text-lg font-semibold text-gray-700">Departamentos</h2>
                <p class="text-3xl font-extrabold text-orange-600 mt-2">
                    {{ \App\Models\Departamento::count() }}
                </p>
            </div>
        </div>

        {{-- Atalhos --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <a href="{{ route('cargos.index') }}"
                class="block bg-blue-600 hover:bg-blue-700 text-white rounded-xl p-5 text-center font-semibold shadow transition">
                📋 Gerenciar Cargos
            </a>

            <a href="{{ route('funcionarios.index') }}"
                class="block bg-green-600 hover:bg-green-700 text-black rounded-xl p-5 text-center font-semibold shadow transition">
                👨‍💼 Funcionários
            </a>

            <a href="{{ route('folha.index') }}"
                class="block bg-purple-600 hover:bg-purple-700 text-black rounded-xl p-5 text-center font-semibold shadow transition">
                💰 Folha de Pagamento
            </a>

            <a href="{{ route('departamentos.index') }}"
                class="block bg-orange-600 hover:bg-orange-700 text-black rounded-xl p-5 text-center font-semibold shadow transition">
                🏢 Departamentos
            </a>

        </div>
    </div>
</x-app-layout>