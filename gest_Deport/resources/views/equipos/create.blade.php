@extends('layouts.dashboard')
@section('styles')
<link rel="stylesheet" href="{{ asset('Css/registrarequipo.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>Registrar Equipo</h1>
    <br>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form class="player-form" action="{{ route('equipos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="nombre_equipo">Nombre del Equipo</label>
        <input type="text" id="nombre_equipo" name="nombre_equipo" required>
        <br class="jump">

        <label for="escudo">Escudo del Equipo</label>
        <input type="file" id="escudo" name="escudo" accept="image/*" required style="display: none;">
        <label for="escudo" class="img-label">Seleccionar imagen</label>
        <br>

        <label for="deporte_id">Deporte</label>
        <select class="input-label" id="deporte_id" name="deporte_id" required>
            <option value="1">Futbol Americano</option>
            <option value="2">Futbol Soccer</option>
            <option value="3">Volleyball</option>
            <option value="4">Basketball</option>
        </select>

        <button type="submit" class="save-button">Guardar</button>
    </form>
</div>
@endsection
