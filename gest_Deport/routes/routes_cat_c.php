

<?php
    /*
    cualquier controlador especificado en este bloque será buscado en el namespace
     App\Http\Controllers.
     */
      /*
        "prefijo" para todas las rutas definidas dentro de ese grupo.
        Esto significa que todas las rutas que se encuentren dentro de esta función
        tendrán como parte inicial de su URL el prefijo modulos/perfil.
        */

        use Illuminate\Support\Facades\Route;
        use App\Http\Controllers\JugadorController;
        use App\Http\Controllers\VistasController;
        use App\Http\Controllers\EntrenadorController;



        Route::group(['namespace' => 'App\Http\Controllers'], function() {

            Route::group(['prefix' => 'modulos/vistas'], function() {
                Route::get('/enVivo', [VistasController::class, 'enVivo'])->name('vistas.enVivo');
                Route::get('/noticias', [VistasController::class, 'noticias'])->name('vistas.noticias');
                Route::get('/torneo', [VistasController::class, 'torneo'])->name('vistas.torneo');
                Route::get('/equipo', [VistasController::class, 'equipo'])->name('vistas.equipo');
                Route::get('/torneo', [VistasController::class, 'torneo'])->name('vistas.torneo');
                Route::get('/equipo', [VistasController::class, 'equipo'])->name('vistas.equipo');
                Route::get('/perfila', [VistasController::class, 'perfila'])->name('vistas.perfila');
                Route::get('/ranking', [VistasController::class, 'ranking'])->name('vistas.ranking');
            });

            Route::group(['prefix' => 'modulos/entrenador'], function(){
                /* - **
                **dashboard
                **crear torneo//Torneo
                **Listado de Equipos**: Lista de equipos registrados con nombre, escudos y detalles básicos.
- **Detalles de Equipo**: Información ampliada sobre un equipo específico, como plantilla de jugadores, estadísticas, y entrenadores.
- **Agregar/Modificar Equipo**: Formularios para registrar un nuevo equipo o actualizar información existente.
- **Asignación de Jugadores**: Sección para vincular jugadores al equipo, cambiar posiciones o actualizar la plantilla.*/
                Route::get('/', [EntrenadorController::class, 'dashboard'])->name('entrenador.dashboard');

                //Route::get('/', [EntrenadorController, 'dashboard'])->name('entrenador.dashboard');
            });

        });
