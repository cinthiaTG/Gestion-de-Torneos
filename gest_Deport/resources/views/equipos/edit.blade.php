@extends('layouts.dashboard')
@section('styles')
<link rel="stylesheet" href="{{ asset('Css/registrarequipo.css') }}">
@endsection

@section('content')
    <h1>Editar Equipo</h1>
    <br>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <!-- Formulario para editar el equipo -->
    <form
    class="player-form"
    action="{{ route('equipos.update', $equipo->id) }}"
    method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Asegúrate de tener esto -->

    <!-- Campo para el nombre del equipo -->
    <div class="section-title">
        <label for="nombre">Nombre del Equipo</label>
        <input type="text" name="nombre_equipo" class="form-control" value="{{ $equipo->nombre_equipo }}" required>
    </div>

    <label for="patrocinador_equipo">Patrocinador del Equipo</label>
    <input type="text" id="patrocinador_equipo" name="patrocinador_equipo" required>
    <br class="jump">


    <!-- Campo para subir el escudo -->
    <label for="escudo">Escudo del Equipo</label>
    <input type="file" id="escudo" name="escudo" accept="image/*" style="display: none;">
    <label for="escudo" class="img-label">Seleccionar imagen</label>

    <!-- Botón para guardar -->
    <button type="submit" class="save-button">Guardar Cambios</button>
</form>


@endsection
