<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function afiseazaFormularReview()
    {
        $profesori = User::where('rol', 'profesor')->get();
        return view('review_profesor', compact('profesori'));
    }

    public function adaugaReview(Request $request)
    {
        // Validare și salvare review
        $request->validate([
            'profesor' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
            'nota' => 'required|numeric|min:1|max:10',
            'mesaj' => 'required|string',
        ]);
    
        // Verifică dacă elevul a mai dat deja un review pentru acel profesor
        $elevId = auth()->user()->id;
        $profesorId = $request->input('profesor');
    
        $reviewExistente = Review::where('elev_id', $elevId)
            ->where('profesor_id', $profesorId)
            ->count();
    
        if ($reviewExistente > 0) {
            return redirect()->back()->with('error', 'Ai deja un review pentru acest profesor.');
        }
    
        // Salvează review-ul în baza de date
        $review = Review::create([
            'elev_id' => $elevId,
            'profesor_id' => $profesorId,
            'rating' => $request->input('rating'),
            'nota' => $request->input('nota'),
            'mesaj' => $request->input('mesaj'),
        ]);
    
        return redirect()->back()->with('success', 'Review adăugat cu succes!');
    }
    


    public function afiseazaProfilProfesor($profesorId)
    {
        $profesor = User::findOrFail($profesorId);

        // Calculează media rating-urilor
        $mediaRating = $profesor->reviews()->avg('rating');

        // Calculează media notelor la examen
        $mediaNotaExamen = $profesor->reviews()->avg('nota');

        // Numără câți elevi au dat review profesorului
        $numarEleviCuReview = $profesor->reviews()->distinct('elev_id')->count();

        // Numără totalul elevilor înregistrați
        $numarTotalElevi = User::where('rol', 'student')->count();

        // Calculează indicele de încredere
        $indiceIncredere = 0; // Inițializează cu 0 în cazul în care nu există elevi înregistrați

        if ($numarTotalElevi > 0) {
            $indiceIncredere = ($numarEleviCuReview / $numarTotalElevi) * 100;
        }

        return view('profil_profesor', compact('profesor', 'mediaRating', 'mediaNotaExamen', 'indiceIncredere'));
    }

    public function afiseazaFormularReviewProfesor()
    {
    // Obține lista de profesori din baza de date
    $profesori = User::where('rol', 'profesor')->get();

    return view('review_profesor', compact('profesori'));
    }   



}
