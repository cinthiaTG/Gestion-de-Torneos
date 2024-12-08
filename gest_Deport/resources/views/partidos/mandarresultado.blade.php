@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/registrarpartidos.css') }}">
@endsection

@section('content')
<div class="p-8 bg-gradient-to-r from-white to-gray-500 rounded-xl shadow-md border border-blue-300">
    <div class="results-table">
        <div class="form-title">Registrar Resultado</div>


        <form class="player-form" action="{{ route('partidos.registrarresultado', $partido->id) }}" method="POST">
            @csrf
            <div class="form-group">

                <label for="id_torneo" style="font-size: 16px; color:black">Torneo</label>
                <input type="text" id="id_torneo" name="id_torneo" class="input-label" value="{{ $partido->torneo->nombre_torneo }}" readonly>
            </div>

            <div class="form-group">

                <label for="id_equipo_local" style="font-size: 16px; color:black">Equipo Local</label>
                <input type="text" id="id_equipo_local" name="id_equipo_local" class="input-label" value="{{ $partido->equipoLocal->nombre_equipo }}" readonly>
            </div>

            <div class="form-group">

                <label for="id_equipo_visitante" style="font-size: 16px; color:black">Equipo Visitante</label>
                <input type="text" id="id_equipo_visitante" name="id_equipo_visitante" class="input-label" value="{{ $partido->equipoVisitante->nombre_equipo }}" readonly>
            </div>

            <div class="form-group">
                <label for="marcador_local" style="font-size: 16px; color:black">Marcador Equipo Local</label>
                <input type="number" id="marcador_local" name="marcador_local" class="input-label" min="0" required>
                @error('marcador_local')
                    <div class="error-message" style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="marcador_visitante" style="font-size: 16px; color:black">Marcador Equipo Visitante</label>
                <input type="number" id="marcador_visitante" name="marcador_visitante" class="input-label" min="0" required>
                @error('marcador_visitante')
                    <div class="error-message" style="color: red;">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-actions">

                <button type="submit" class="register-button">Registrar Resultado</button>
            </div>
        </form>
    </div>
</div>
@endsection
