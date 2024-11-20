@extends('layouts.dashboard')
@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/registrarequipo.css') }}">
@endsection

@section('content')

<div class="container">
    <h1>Editar Jugador</h1>
    <br>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form class="player-form" action="{{ route('jugadores.update', $jugador->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $jugador->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="apellido_paterno">Apellido Paterno</label>
            <input type="text" name="apellido_paterno" class="form-control" value="{{ $jugador->apellido_paterno }}" required>
        </div>

        <div class="form-group">
            <label for="apellido_materno">Apellido Materno</label>
            <input type="text" name="apellido_materno" class="form-control" value="{{ $jugador->apellido_materno }}" required>
        </div>

        <div class="form-group">
            <label for="edad">Edad</label>
            <input type="number" name="edad" class="form-control" value="{{ $jugador->edad }}" required>
        </div>

        <div class="form-group">
            <label for="posicion">Posición</label>
            <input type="text" name="posicion" class="form-control" value="{{ $jugador->posicion }}" required>
        </div>

        <div class="form-group">
            <label for="puntos">Puntos</label>
            <input type="number" name="puntos" class="form-control" value="{{ $jugador->puntos }}" required>
        </div>

        <div class="form-group">
            <label for="asistencias">Asistencias</label>
            <input type="number" name="asistencias" class="form-control" value="{{ $jugador->asistencias }}" required>
        </div>

        <div class="form-group">
            <label for="tarjetas_amarillas">Tarjetas Amarillas</label>
            <input type="number" name="tarjetas_amarillas" class="form-control" value="{{ $jugador->tarjetas_amarillas }}" required>
        </div>

        <div class="form-group">
            <label for="tarjetas_rojas">Tarjetas Rojas</label>
            <input type="number" name="tarjetas_rojas" class="form-control" value="{{ $jugador->tarjetas_rojas }}" required>
        </div>

        <div class="form-group">
            <label for="faltas">Faltas</label>
            <input type="number" name="faltas" class="form-control" value="{{ $jugador->faltas }}" required>
        </div>

        <button type="submit" class="actualizar">Actualizar</button>
        <a href="{{route('jugador.read')}}" class="btn btn-secondary">Cancelar</a>
        
    </form>
</div>


@endsection
