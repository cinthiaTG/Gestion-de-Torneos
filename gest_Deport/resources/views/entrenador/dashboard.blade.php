@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{asset('Css/dashboard.css')}}">
@endsection

@section('content')
<!-- Contenedor principal para las tarjetas 
Route::group(['prefix' => 'entrenador/partidos'], function () {
        Route::get('/create', [PartidosController::class, 'create'])->name('partidos.create');
        Route::post('/store', [PartidosController::class, 'store'])->name('partidos.store');
        Route::get('/read', [PartidosController::class, 'read'])->name('partidos.read');
        Route::get('/edit/{id}', [PartidosController::class, 'edit'])->name('partidos.edit');
        Route::post('/update/{id}', [PartidosController::class, 'update'])->name('partidos.update');
        Route::delete('/destroy/{id}', [PartidosController::class, 'destroy'])->name('partidos.destroy');
    });
-->
<div class="card-container">
    <!-- Tarjetas principales -->
    <a href="{{route('torneo.create')}}" class="card">
        <div class="card-label">Crear Torneo</div>
    </a>
    <a href="#" class="card">
        <div class="card-label">Editar Torneo</div>
    </a>
    <a href="#" class="card">
        <div class="card-label">Consultar Historial de Torneos</div>
    </a>

    <a href="{{route('partidos.create')}}" class="card">
        <div class="card-label">Crear Partido</div>
    <a href="{{route('partidos.read')}}" class="card">
        <div class="card-label">Editar Partido</div>
    </a>

    <a href="{{route('equipos.create')}}" class="card">
        <div class="card-label">Registrar Equipo</div>
    </a>
    <a href="{{route('equipos.read')}}" class="card">
        <div class="card-label">Editar Equipo</div>
    </a>

    <a href="{{route('jugadores.create')}}" class="card">
        <div class="card-label">Registrar Jugador</div>
    </a>
    <a href="{{route('jugador.read')}}" class="card">
        <div class="card-label">Editar Jugador</div>
    </a>

    <a href="#" class="card">
        <div class="card-label">Registrar Resultado</div>
    </a>
    <a href="#" class="card">
        <div class="card-label">Registrar Instalación</div>
    </a>
    <a href="#" class="card">
        <div class="card-label">Editar Instalación</div>
    </a>
    
</div>
@endsection
