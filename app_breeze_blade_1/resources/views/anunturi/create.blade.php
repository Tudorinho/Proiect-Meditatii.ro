<!-- resources/views/anunturi/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Adăugare Anunț') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Formularul de adăugare a anunțului -->
                    <form action="{{ route('anunturi.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="titlu" class="form-label">Titlu:</label>
                            <input type="text" style="color: brown" class="form-control" id="titlu" name="titlu" required>
                        </div>
                        <div class="mb-3">
                            <label for="continut" class="form-label">Conținut:</label>
                            <textarea class="form-control" style="color: brown" id="continut" name="continut" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="subiect" class="form-label">Subiect:</label>
                            <select class="form-select" style="color: brown" id="subiect" name="subiect" required>
                                <option value="informatica">Informatica</option>
                                <option value="matematica">Matematica</option>
                                <option value="limba_romana">Limba Romana</option>
                                <option value="limba_engleza">Limba Engleza</option>
                                <option value="istorie">Istorie</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Adaugă Anunț</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>








{{-- <div>
    <h2>Adăugare Anunț</h2>

    <!-- Formularul de adăugare a anunțului -->
    <form action="{{ route('anunturi.store') }}" method="post">
        @csrf
        <div>
            <label for="titlu">Titlu:</label>
            <input type="text" id="titlu" name="titlu" required>
        </div>
        <div>
            <label for="continut">Conținut:</label>
            <textarea id="continut" name="continut" rows="4" required></textarea>
        </div>
        <div>
            <label for="subiect">Subiect:</label>
            <select id="subiect" name="subiect" required>
                <option value="informatica">Informatica</option>
                <option value="matematica">Matematica</option>
                <option value="limba_romana">Limba Romana</option>
                <option value="limba_engleza">Limba Engleza</option>
                <option value="istorie">Istorie</option>
            </select>
        </div>

        <button type="submit">Adaugă Anunț</button>
    </form>
</div> --}}




