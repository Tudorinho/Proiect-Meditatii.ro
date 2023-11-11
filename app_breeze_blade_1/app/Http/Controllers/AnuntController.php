<?php
// app/Http/Controllers/AnuntController.php

namespace App\Http\Controllers;

use App\Models\Anunt;
use Illuminate\Http\Request;

class AnuntController extends Controller
{
    // Alte metode pentru adăugarea, editarea și ștergerea anunțurilor...

    public function create()
{
    // Verifică dacă utilizatorul are rolul de 'profesor'
    if (auth()->user()->rol !== 'profesor') {
        // Redirecționează utilizatorii care nu sunt profesori
        return redirect()->route('dashboard')->with('error', 'Acces restricționat.');
    }

    // Restul codului pentru metoda create
    return view('anunturi.create');
}

    public function store(Request $request)
    {
        $request->validate([
            'titlu' => 'required|string|max:255',
            'continut' => 'required|string',
            'subiect' => 'required|string',
            // Adaugă și alte reguli de validare pentru celelalte câmpuri
        ]);

        // Obține user_id din utilizatorul autentificat
        $user_id = auth()->user()->id;

        // Salvați anunțul în baza de date
        anunt::create([
            'user_id' => $user_id,
            'titlu' => $request->titlu,
            'continut' => $request->continut,
            'subiect' => $request->subiect,
            // Adaugă și alte câmpuri aici
        ]);


        // Redirecționați utilizatorul către pagina de anunțuri sau unde doriți să-i duceți după adăugarea anunțului.
        return redirect()->route('anunturi.index')->with('status', 'Anunțul a fost adăugat cu succes!');
    }

//     public function index()
// {
//     // Obține toate anunțurile din baza de date
//     $anunturi = Anunt::all();

//     // Returnează pagina cu lista de anunțuri
//     return view('anunturi.index', compact('anunturi'));
// }

public function index(Request $request)
    {
        // Obține toate anunțurile din baza de date
        $anunturi = Anunt::all();

        // Dacă există o cerere de filtrare după subiect, aplică filtrul
        if ($request->has('subiect')) {
            $anunturi = $anunturi->where('subiect', $request->subiect);
        }

        // Returnează pagina cu lista de anunțuri
        return view('welcome', compact('anunturi'));
    }

}
