<?php

// În DashboardController.php

namespace App\Http\Controllers;

use App\Models\Anunt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Afișează pagina de bord cu anunțuri.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $anunturi = Anunt::all();

        return view('dashboard', compact('anunturi'));
    }
}
