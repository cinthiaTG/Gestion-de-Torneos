<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AficionadoController;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\ArbitroController;
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
        Route::get('/create', [JugadorController::class, 'create'])->name('jugadores.create');//form p/crear jugador
        Route::post('/store', [JugadorController::class, 'store'])->name('jugadores.store'); // guardar jugador
        Route::get('/{id}/edit', [JugadorController::class, 'edit'])->name('jugadores.edit'); // form de edición
        Route::get('/read', [JugadorController::class, 'read'])->name('jugador.read'); // form de read
        Route::put('/{id}', [JugadorController::class, 'update'])->name('jugadores.update'); // actuliz jugador
        Route::delete('/{id}', [JugadorController::class, 'destroy'])->name('jugadores.destroy'); // elimin jugador
    });
    Route::group(['prefix' => 'entrenador/equipos'], function () {
        Route::get('/read', [EquiposController::class, 'read'])->name('equipos.read'); // Mostrar todos los equipos
        Route::get('/create', [EquiposController::class, 'create'])->name('equipos.create'); // Formulario para crear
        Route::post('/store', [EquiposController::class, 'store'])->name('equipos.store'); // Guardar nuevo equipo
        Route::get('/{id}/edit', [EquiposController::class, 'edit'])->name('equipos.edit'); // Formulario de edición
        Route::put('/{id}', [EquiposController::class, 'update'])->name('equipos.update'); // Actualizar equipo
        Route::delete('/{id}', [EquiposController::class, 'destroy'])->name('equipos.destroy'); // Eliminar equipo
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
