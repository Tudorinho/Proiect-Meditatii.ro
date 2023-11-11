
    <h2>Adaugă un review pentru un profesor</h2>

    <form method="POST" action="{{ route('adauga.review') }}">
        @csrf

        <label for="profesor">Alege profesorul:</label>
        <select name="profesor" id="profesor">
            @foreach($profesori as $profesor)
                <option value="{{ $profesor->id }}">{{ $profesor->name }}</option>
            @endforeach
        </select>

        <br>

        <label for="rating">Rating (1-5 stele):</label>
        <input type="number" name="rating" id="rating" min="1" max="5" required>

        <br>

        <label for="nota">Nota la examen (1-10):</label>
        <input type="number" name="nota" id="nota" min="1" max="10" required>

        <br>

        <label for="mesaj">Mesaj:</label>
        <textarea name="mesaj" id="mesaj" rows="4" cols="50"></textarea>

        <br>

        <button type="submit">Adaugă Review</button>
    </form>


    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif


