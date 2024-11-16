<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AficionadoController;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\ArbitroController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Ruta para el dashboard principal
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->rol_id == 1) {
        // Redirige al dashboard de aficionado
        return redirect()->route('aficionado.dashboard');
    } elseif ($user->rol_id == 2) {
        // Redirige al dashboard de entrenador
        return redirect()->route('entrenador.dashboard');
    }
    elseif ($user->rol_id == 3) {
        // Redirige al dashboard de entrenador
        return redirect()->route('jugador.dashboard');
    }
    elseif ($user->rol_id == 4) {
        // Redirige al dashboard de entrenador
        return redirect()->route('arbitro.dashboard');
    }

    // Si el rol no coincide, redirige a una ruta predeterminada, por ejemplo, el home
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');


//dashboard de cada usuario
Route::get('/aficionado/dashboard', [AficionadoController::class, 'dashboard'])->name('aficionado.dashboard');
Route::get('/entrenador/dashboard', [EntrenadorController::class, 'dashboard'])->name('entrenador.dashboard');
Route::get('/jugador/dashboard', [JugadorController::class, 'dashboard'])->name('jugador.dashboard');
Route::get('/arbitro/dashboard', [ArbitroController::class, 'dashboard'])->name('arbitro.dashboard');


// Rutas protegidas para el perfil del usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
