@extends('layouts.dashboard')
@section('styles')
<link rel="stylesheet" href="{{ asset('Css/registrarequipo.css') }}">
@endsection

@section('content')
<div class="container">
    <!-- Contenedor principal del formulario -->
    <div class="form-container">
        <div class="p-8 bg-gradient-to-r from-purple-400 to-gray-100 rounded-xl shadow-md border">
            
            <!-- Enlace para regresar a la vista de equipos -->
            <a href="{{ route('equipos.read') }}">
                <div class="form-title text-2xl font-bold text-gray-800 mb-4" style="text-align: center; font-size: 30px">
                    Editar Equipo
                </div>
            </a>

            <br>
            
            <!-- Mensaje de éxito si existe -->
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
                    <label for="nombre" style="font-size: 16px">Nombre del Equipo</label>
                    <input type="text" name="nombre_equipo" class="form-control" value="{{ $equipo->nombre_equipo }}" required>
                </div>

                <!-- Campo para el patrocinador del equipo -->
                <div class="section-title">
                    <label for="patrocinador_equipo" style="font-size: 16px">Patrocinador del Equipo</label>
                    <input type="text" name="patrocinador_equipo" class="form-control" value="{{ $equipo->patrocinador_equipo }}" required>
                </div>


                <!-- Campo para el monto patrocinador -->
                <div class="section-title">
                    <label for="monto_patrocinador" style="font-size: 16px">Monto patrocinador</label>
                    <input type="number" name="monto_patrocinador" class="form-control" value="{{ $equipo->monto_patrocinador }}" required>
                </div>


                <!-- Campo para subir el escudo -->
                <div class="section-title">
                    <label for="escudo" style="font-size: 16px">Escudo del Equipo</label>
                    <input type="file" id="escudo" name="escudo" accept="image/*" style="display: none;">
                    <label for="escudo" class="img-label">Seleccionar imagen</label>
                </div>

                <!-- Botón para guardar -->
                <div class="form-button">
                    <button type="submit" class="save-button">Guardar Cambios</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
