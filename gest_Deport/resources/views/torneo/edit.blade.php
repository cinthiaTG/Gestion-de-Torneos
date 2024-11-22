@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/editarjugador2.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>Editar Torneo</h1>
    <form class="player-form" action="{{ route('torneo.update', $torneo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre_torneo" class="form-label">Nombre Torneo</label>
            <input type="text" name="nombre_torneo" id="nombre_torneo" class="form-control" value="{{ $torneo->nombre_torneo }}" required>
        </div>

        <div class="mb-3">
            <label for="tipo_torneo" class="form-label">Tipo</label>
            <input type="text" name="tipo_torneo" id="tipo_torneo" class="form-control" value="{{ $torneo->tipo_torneo }}" required>
        </div>

        <div class="mb-3">
            <label for="numero_equipos" class="form-label">Numero de Equipos</label>
            <input type="number" name="numero_equipos" id="numero_equipos" class="form-control" value="{{ $torneo->numero_equipos }}" required>
        </div>

        <div class="mb-3">
            <label for="deporte_id" class="form-label">Deporte</label>
            <select class="input-label" id="deporte_id" name="deporte_id" required>
                <option value="" selected>Selecciona un deporte</option>
                <option value="1">Futbol Americano</option>
                <option value="2">Futbol Soccer</option>
                <option value="3">Volleyball</option>
                <option value="4">Basketball</option>
            </select>        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
