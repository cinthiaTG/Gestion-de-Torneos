@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/registrarequipo.css') }}">
@endsection

@section('content')
    <div>
        <div>
            <div class="p-8 bg-gradient-to-r from-purple-400 to-gray-100 rounded-xl shadow-md border">

            <a href="{{ route('equipos.read') }}">
                <div class="form-title text-2xl font-bold text-gray-800 mb-4" style="text-align: center; font-size: 30px">
                    Registrar Equipo
                </div>
            </a> 

                @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form class="player-form" action="{{ route('equipos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="nombre_equipo" style="font-size: 16px">Nombre del Equipo</label>
        <input type="text" id="nombre_equipo" name="nombre_equipo" required>
        <br class="jump">

        <label for="escudos" style="font-size: 16px">Escudo del Equipo</label>
        <input type="file" id="escudos" name="escudos" accept="image/*" required style="display: none;">
        <label for="escudos" class="img-label" >Seleccionar imagen</label>
        <br>

        <label for="patrocinador_equipo" style="font-size: 16px">Patrocinador del Equipo</label>
        <input type="text" id="patrocinador_equipo" name="patrocinador_equipo" >
        <br class="jump">

        <label for="monto_patrocinador" style="font-size: 16px">Monto patrocinador</label>
        <input type="number" id="monto_patrocinador" name="monto_patrocinador" >
        <br class="jump">

        <button type="submit" class="save-button">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
