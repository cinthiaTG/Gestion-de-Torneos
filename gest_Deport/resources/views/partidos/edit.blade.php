@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/editarjugador2.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>Editar Partido</h1>
    <form class="player-form" action="{{ route('partidos.update', $partido->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_torneo" class="form-label">Torneo</label>
            <select name="id_torneo" id="id_torneo" class="form-select" required>
                @foreach ($torneo as $torneo)
                    <option value="{{ $torneo->id }}" {{ $torneo->id == $partido->id_torneo ? 'selected' : '' }}>
                        {{ $torneo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_equipo_local" class="form-label">Equipo Local</label>
            <select name="id_equipo_local" id="id_equipo_local" class="form-select" required>
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo->id }}" {{ $equipo->id == $partido->id_equipo_local ? 'selected' : '' }}>
                        {{ $equipo->nombre_equipo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_equipo_visitante" class="form-label">Equipo Visitante</label>
            <select name="id_equipo_visitante" id="id_equipo_visitante" class="form-select" required>
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo->id }}" {{ $equipo->id == $partido->id_equipo_visitante ? 'selected' : '' }}>
                        {{ $equipo->nombre_equipo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $partido->fecha }}" required>
        </div>

        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" name="hora" id="hora" class="form-control" value="{{ $partido->hora }}" required>
        </div>

        <div class="mb-3">
            <label for="lugar" class="form-label">Lugar</label>
            <input type="text" name="lugar" id="lugar" class="form-control" value="{{ $partido->lugar }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
