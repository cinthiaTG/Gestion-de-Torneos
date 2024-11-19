@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{asset('Css/dashboard.css')}}">
@endsection

@section('content')
<!-- Contenedor principal para las tarjetas -->
<div class="card-container">
    <!-- Tarjetas principales -->
    <a href="#" class="card">
        <div class="card-label">Crear Torneo</div>
    </a>
    <a href="#" class="card">
        <div class="card-label">Editar Torneo</div>
    </a>
    <a href="#" class="card">
        <div class="card-label">Consultar Historial de Torneos</div>
    </a>

    <a href="#" class="card">
        <div class="card-label">Crear Partido</div>
    </a>
    <a href="#" class="card">
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
