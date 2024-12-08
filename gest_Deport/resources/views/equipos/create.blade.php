@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/registrarequipo.css') }}">
@endsection

@section('content')
    <div>
        <div>
            <div class="p-8 bg-gradient-to-r from-blue-200 to-blue-100 rounded-xl shadow-md border border-blue-300">
                <div class="form-title text-2xl font-bold text-gray-800 mb-4">Registrar Equipo </div>

                @if (session('success'))
                    <p>{{ session('success') }}</p>
                @endif

                <form class="player-form" action="{{ route('equipos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="nombre_equipo">Nombre del Equipo</label>
                    <input type="text" id="nombre_equipo" maxlength="50" name="nombre_equipo" required>
                    <br class="jump">

                    <label for="escudos">Escudo del Equipo</label>
                    <input type="file" id="escudos" name="escudos" accept="image/*" required style="display: none;">
                    <label for="escudos" class="img-label">Seleccionar imagen</label>
                    <br>

                    <label for="patrocinador_equipo">Patrocinador del Equipo</label>
                    <input type="text" id="patrocinador_equipo" maxlength="20" name="patrocinador_equipo">
                    <br class="jump">

                    <label for="monto_patrocinador">Monto patrocinador</label>
                    <input type="number" id="monto_patrocinador" max="1000000" name="monto_patrocinador">
                    <br class="jump">

                    <button type="submit" class="save-button">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
