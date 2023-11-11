   {{-- <h2>Anunțuri</h2>

    @foreach($anunturi as $anunt)
        <div>
            <h3>{{ $anunt->titlu }}</h3>
            <p>{{ $anunt->continut }}</p>
            <p>{{ $anunt->subiect}}</p>
        </div>
    @endforeach --}}



    <!-- resources/views/anunturi/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Anunțuri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-semibold mb-4">Anunțuri</h2>

                    @foreach($anunturi as $anunt)
                        <div class="mb-4">
                            <h3 class="text-xl">{{ $anunt->titlu }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $anunt->continut }}</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ $anunt->subiect }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


