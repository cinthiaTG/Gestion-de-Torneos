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

    <a href="{{route('torneo.read')}}" class="card">
        <div class="card-label">Torneos</div>
    </a>
        
    <a href="{{route('partidos.read')}}" class="card">
        <div class="card-label">Partidos</div>
    </a>

    <a href="{{route('equipos.read')}}" class="card">
        <div class="card-label">Equipos</div>
    </a>
    <a href="{{route('jugador.read')}}" class="card">
        <div class="card-label">Jugadores</div>
    </a>
    <a href="{{route('instalacion.read')}}" class="card">
        <div class="card-label">Instalaciones</div>
    </a>

</div>
@endsection
