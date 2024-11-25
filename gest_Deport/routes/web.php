<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AficionadoController;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\ArbitroController;
use App\Http\Controllers\PartidosController;
use App\Http\Controllers\TorneoController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar rutas web para tu aplicación. Estas
| rutas son cargadas por el RouteServiceProvider y estarán asignadas
| al grupo "web". ¡Crea algo genial!
|
*/

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta para redireccionar al dashboard según el rol del usuario
Route::get('/dashboard', function () {
    $user = auth()->user();

    switch ($user->rol_id) {
        case 1:
            return redirect()->route('aficionado.dashboard');
        case 2:
            return redirect()->route('entrenador.dashboard');
        case 3:
            return redirect()->route('jugador.dashboard');
        case 4:
            return redirect()->route('arbitro.dashboard');
        default:
            return redirect('/')->with('error', 'Rol no válido.');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas específicas para los dashboards de cada tipo de usuario protegidas con middleware de roles
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/aficionado/dashboard', [AficionadoController::class, 'dashboard'])->name('aficionado.dashboard');
});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/entrenador/dashboard', [EntrenadorController::class, 'dashboard'])->name('entrenador.dashboard');
  
    Route::group(['prefix' => 'entrenador/jugadores'], function() {
        Route::get('/create', [JugadorController::class, 'create'])->name('jugadores.create');
        Route::post('/store', [JugadorController::class, 'store'])->name('jugadores.store'); 
        Route::get('/{id}/edit', [JugadorController::class, 'edit'])->name('jugadores.edit'); 
        Route::get('/read', [JugadorController::class, 'read'])->name('jugador.read'); 
        Route::put('/{id}', [JugadorController::class, 'update'])->name('jugadores.update');
        Route::delete('/{id}', [JugadorController::class, 'destroy'])->name('jugadores.destroy');
    });
    Route::group(['prefix' => 'entrenador/equipos'], function () {
        Route::get('/read', [EquiposController::class, 'read'])->name('equipos.read'); 
        Route::get('/create', [EquiposController::class, 'create'])->name('equipos.create'); 
        Route::post('/store', [EquiposController::class, 'store'])->name('equipos.store'); 
        Route::get('/{id}/edit', [EquiposController::class, 'edit'])->name('equipos.edit'); 
        Route::put('/{id}', [EquiposController::class, 'update'])->name('equipos.update'); 
        Route::delete('/{id}', [EquiposController::class, 'destroy'])->name('equipos.destroy');
    });
    Route::group(['prefix' => 'entrenador/torneo'], function () {
        Route::get('/read', [TorneoController::class, 'read'])->name('torneo.read');
        Route::get('/create', [TorneoController::class, 'create'])->name('torneo.create');
        Route::post('/store', [TorneoController::class, 'store'])->name('torneo.store');
        Route::get('/{id}/edit', [TorneoController::class, 'edit'])->name('torneo.edit');
        Route::put('/{id}', [TorneoController::class, 'update'])->name('torneo.update');
        Route::delete('/{id}', [TorneoController::class, 'destroy'])->name('torneo.destroy');
    });
    
    Route::group(['prefix' => 'entrenador/partidos'], function () {
        Route::get('/create', [PartidosController::class, 'create'])->name('partidos.create');
        Route::post('/store', [PartidosController::class, 'store'])->name('partidos.store');
        Route::get('/read', [PartidosController::class, 'read'])->name('partidos.read');
        Route::get('/edit/{id}', [PartidosController::class, 'edit'])->name('partidos.edit');
        Route::post('/update/{id}', [PartidosController::class, 'update'])->name('partidos.update');
        Route::delete('/destroy/{id}', [PartidosController::class, 'destroy'])->name('partidos.destroy');
    });
    

});

Route::middleware(['auth', 'role:3'])->group(function () {
    Route::get('/jugador/dashboard', [JugadorController::class, 'dashboard'])->name('jugador.dashboard');
});

Route::middleware(['auth', 'role:4'])->group(function () {
    Route::get('/arbitro/dashboard', [ArbitroController::class, 'dashboard'])->name('arbitro.dashboard');
});

// Rutas protegidas para el perfil del usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// Rutas de autenticación generadas automáticamente
require __DIR__ . '/auth.php';
