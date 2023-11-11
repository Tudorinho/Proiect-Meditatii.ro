<?php

use App\Http\Controllers\AnuntController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\anunt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     $anunturi = anunt::all(); 
//     return view('welcome', compact('anunturi'));
// })->name('/');

Route::get('/', [AnuntController::class, 'index'])->name('/');


// Route::get('/welcome', function () {
//     $anunturi = anunt::all(); 
//     return view('welcome', compact('anunturi'));
// })->name('welcome');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/anunturi', [AnuntController::class, 'index'])->name('anunturi.index');

// Route::get('/anunturi', [AnuntController::class, 'index'])->name('anunturi.index');
// Route::get('/anunturi/{subiect?}', [AnuntController::class, 'index'])->name('anunturi.index');


Route::get('/anunturi/create', [AnuntController::class, 'create'])->name('anunturi.create');
// Route::post('/anunturi', [AnuntController::class, 'store'])->name('anunturi.store');
Route::post('/anunturi/store', [AnuntController::class, 'store'])->name('anunturi.store');


// Route::get('/', [AnuntController::class, 'index']);

require __DIR__.'/auth.php';
