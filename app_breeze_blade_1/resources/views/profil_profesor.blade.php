


    <h1>Profil Profesor - {{ $profesor->name }}</h1>

    <p>Email: {{ $profesor->email }}</p>
    <p>Rol: {{ $profesor->rol }}</p>

    <h2>Statistici Review:</h2>
    <p>Media Rating: {{ number_format($mediaRating, 2) }}</p>
    <p>Media Nota Examen: {{ number_format($mediaNotaExamen, 2) }}</p>
    <p>Indice de Încredere: {{ number_format($indiceIncredere, 2) }}%</p>

    <h2>Review-uri:</h2>
    @foreach($profesor->reviews as $review)
        <div>
            <p>Mesaj: {{ $review->mesaj }}</p>
            <p>Rating: {{ $review->rating }}</p>
            <p>Nota Examen: {{ $review->nota }}</p>
        </div>
        <hr>
    @endforeach

