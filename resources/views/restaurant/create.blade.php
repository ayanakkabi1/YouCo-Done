<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#FF2D78] leading-tight">
            {{ __('Ajouter un nouveau Restaurant') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-zinc-900 border border-zinc-800 overflow-hidden shadow-sm sm:rounded-2xl p-8">

                <form method="POST" action="{{ route('restaurant.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Nom du Restaurant')" class="text-zinc-400" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-black border-zinc-700 text-white focus:border-[#FF2D78] focus:ring-[#FF2D78]" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="ville" :value="__('Ville')" class="text-zinc-400" />
                            <x-text-input id="ville" name="ville" type="text" class="mt-1 block w-full bg-black border-zinc-700 text-white focus:border-[#FF2D78] focus:ring-[#FF2D78]" required />
                            <x-input-error class="mt-2" :messages="$errors->get('ville')" />
                        </div>

                        <div>
                            <x-input-label for="capacity" :value="__('Capacité (Couverts)')" class="text-zinc-400" />
                            <x-text-input id="capacity" name="capacity" type="number" class="mt-1 block w-full bg-black border-zinc-700 text-white focus:border-[#FF2D78] focus:ring-[#FF2D78]" required />
                            <x-input-error class="mt-2" :messages="$errors->get('capacity')" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="cuisine" :value="__('Type de Cuisine (ex: Libanaise, Italienne, Vegan...)')" class="text-zinc-400" />
                        <x-text-input
                            id="cuisine"
                            name="cuisine"
                            type="text"
                            placeholder="Ex: Marocaine"
                            class="mt-1 block w-full bg-black border-zinc-700 text-white focus:border-[#FF2D78] focus:ring-[#FF2D78]"
                            required />
                        <x-input-error class="mt-2" :messages="$errors->get('cuisine')" />
                    </div>


                    <div class="flex items-center justify-end mt-6">
                        <a href="{{ route('restaurant.index') }}" class="text-zinc-500 hover:text-white mr-4 transition">Annuler</a>
                        <x-primary-button class="bg-[#FF2D78] hover:bg-[#e0266a] py-3 px-8">
                            {{ __('Enregistrer le restaurant') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>