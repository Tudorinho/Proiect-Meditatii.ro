<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

   
        <div class="container" style="color: aqua">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            Bine ați venit în panoul de control!
                            <br>

                            <!-- Afișează butonul de adăugare a anunțului pentru profesor -->
                            @if(Auth::user()->rol === 'profesor')
                                <a href="{{ route('anunturi.create') }}" class="btn btn-primary">Adaugă Anunț</a>
                                <br><br><br>


                                 <!-- Afișează anunțurile profesorului curent -->
                            <h2 class="text-2xl font-semibold mb-4">Anunțurile tale</h2>
                            @foreach(Auth::user()->anunturi as $anunt)
                                <div class="mb-4">
                                    <h3 class="text-xl">{{ $anunt->titlu }}</h3>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $anunt->continut }}</p>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $anunt->subiect }}</p>
                                </div>
                            @endforeach
                            @endif

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

</x-app-layout>
