@extends('layouts.dashboard')

@section('content')
<!-- Contenedor principal para las tarjetas -->
<div class="card-container">
    <!-- Tarjetas principales -->
    <a href="#" class="card">
        <div class="card-label">Crear Torneo</div>
    </a>
    <a href="#" class="card">
        <div class="card-label">Registrar Equipo</div>
    </a>
    <a href="{{route('entrenador.registrarJugador')}}" class="card">
        <div class="card-label">Registrar Jugador</div>
    </a>
</div>

<!-- Historial -->
<div class="history-section">
    <div class="card-wrapper">
        <div class="card"></div>
    </div>
    <div class="history-label">Consultar Historial<br>de Torneos</div>
</div>

<!-- Más opciones -->
<div class="flex-container">
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
</div>

<!-- Segunda fila de tarjetas -->
<div class="card-container card-container2">
    <a href="#" class="card">
        <div class="card-label">Registrar Resultado</div>
    </a>
    <a href="#" class="card">
        <div class="card-label">Editar Equipo</div>
    </a>
    <a href="#" class="card">
        <div class="card-label">Editar Jugador</div>
    </a>
</div>

<!-- Tercera fila de tarjetas -->
<div class="card-container card-container3">
    <a href="#" class="card">
        <div class="card-label">Registrar Instalación</div>
    </a>
    <a href="#" class="card">
        <div class="card-label">Editar Instalación</div>
    </a>
    <a href="#" class="card">
        <div class="card-label">Consultar Historial de Torneos</div>
    </a>
</div>
@endsection
