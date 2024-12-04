@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/registrarpartidos.css') }}">
@endsection

@section('content')

<div class="results-table">
    <div class="form-title">Registrar Resultado</div>
    <form class="player-form" action="{{ route('partidos.registrarresultado', $partido->id) }}" method="POST">
        @csrf

        <label for="id_torneo">Torneo</label>
        <input type="text" id="id_torneo" name="id_torneo" class="input-label" value="{{ $partido->torneo->nombre_torneo }}" readonly>

        <label for="id_equipo_local">Equipo Local</label>
        <input type="text" id="id_equipo_local" name="id_equipo_local" class="input-label" value="{{ $partido->equipoLocal->nombre_equipo }}" readonly>

        <label for="id_equipo_visitante">Equipo Visitante</label>
        <input type="text" id="id_equipo_visitante" name="id_equipo_visitante" class="input-label" value="{{ $partido->equipoVisitante->nombre_equipo }}" readonly>

        <label for="marcador_local">Marcador Equipo Local</label>
        <input type="number" id="marcador_local" name="marcador_local" class="input-label" min="0" required>

        <label for="marcador_visitante">Marcador Equipo Visitante</label>
        <input type="number" id="marcador_visitante" name="marcador_visitante" class="input-label" min="0" required>

        <button type="submit" class="save-button">Registrar Resultado</button>
    </form>
</div>

@endsection
