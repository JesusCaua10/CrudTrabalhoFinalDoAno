<x-app-layout>
    <div class="p-6">

        <h2 class="text-2xl font-bold text-white mb-6">Novo Cargo</h2>

        <x-card>
            <form action="{{ route('cargos.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <x-input-label for="nome" value="Nome" class="text-gray-300" />
                    <x-text-input id="nome" name="nome" type="text" value="{{ old('nome') }}" placeholder="Nome do cargo" class="mt-1 block w-full" required />
                    <x-input-error :messages="$errors->get('nome')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="salario_base" value="Salário Base" class="text-gray-300" />
                    <x-text-input id="salario_base" name="salario_base" type="number" step="0.01" value="{{ old('salario_base') }}" placeholder="Salário base" class="mt-1 block w-full" required />
                    <x-input-error :messages="$errors->get('salario_base')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="nivel_acesso" value="Nível de Acesso" class="text-gray-300" />
                    <x-text-input id="nivel_acesso" name="nivel_acesso" type="text" value="{{ old('nivel_acesso') }}" placeholder="Nível de acesso" class="mt-1 block w-full" required />
                    <x-input-error :messages="$errors->get('nivel_acesso')" class="mt-1" />
                </div>

                <div class="flex justify-end mt-4">
                    <x-primary-button type="submit">Salvar</x-primary-button>
                </div>
            </form>
        </x-card>

    </div>
</x-app-layout>
