@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/registrarpartidos.css') }}">
@endsection

@section('content')

<div class="results-table">
    <div class="form-title">Registrar Partido</div>
    <form class="player-form" action="{{ route('partidos.store') }}" method="POST">
        @csrf

        <label for="id_torneo">Torneo</label>
        <select id="id_torneo" name="id_torneo" class="input-label" required>
            <option value="" selected>Selecciona un torneo</option>
            @foreach ($torneo as $torneo)
                <option value="{{ $torneo->id }}">{{ $torneo->nombre_torneo }}</option>
            @endforeach
        </select>

        <label for="id_equipo_local">Equipo Local</label>
        <select id="id_equipo_local" name="id_equipo_local" class="input-label" required>
            <option value="" selected>Selecciona un equipo</option>
            @foreach ($equipos as $equipo)
                <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option>
            @endforeach
        </select>

        <label for="id_equipo_visitante">Equipo Visitante</label>
        <select id="id_equipo_visitante" name="id_equipo_visitante" class="input-label" required>
            <option value="" selected>Selecciona un equipo</option>
            @foreach ($equipos as $equipo)
                <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option>
            @endforeach
        </select>

        <label for="fecha">Fecha</label>
        <input type="date" id="fecha" name="fecha" class="input-date" required>

        <label for="hora">Hora</label>
        <input type="time" id="hora" name="hora" class="input-time" required>

        <label for="id_instalacion">Instalación</label>
        <select id="id_instalacion" name="id_instalacion" class="input-label" required>
            <option value="" selected>Selecciona una instalación</option>
            @foreach ($instalaciones as $instalacion)
                <option value="{{ $instalacion->id }}">{{ $instalacion->nombre_instalacion }}</option>
            @endforeach
        </select>

        <button type="submit" class="save-button">Registrar</button>
    </form>
</div>

@endsection
