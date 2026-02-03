<x-app-layout>
    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">
                    Découvrez nos <span class="text-[#FF2D78]">Espaces</span>
                </h2>
               
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($restaurants as $restaurant)
                    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 hover:border-[#FF2D78] transition-all duration-300 group">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-bold text-white group-hover:text-[#FF2D78]">{{ $restaurant->name }}</h3>
                            <span class="bg-zinc-800 text-zinc-400 text-xs px-2 py-1 rounded">{{ $restaurant->cuisine }}</span>
                        </div>
                        <p class="text-zinc-500 mt-2">{{ $restaurant->ville }}</p>
                        
                        <div class="mt-6 flex items-center justify-between">
                            <span class="text-zinc-400 text-sm italic">Capacité: {{ $restaurant->capacity }}</span>
                            <button class="text-[#FF2D78] font-semibold hover:underline">Réserver</button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20 border-2 border-dashed border-zinc-800 rounded-2xl">
                        <p class="text-zinc-500">Aucun restaurant n'est disponible pour le moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>