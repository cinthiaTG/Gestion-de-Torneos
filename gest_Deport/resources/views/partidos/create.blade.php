@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/registrarpartidos.css') }}">
@endsection

@section('content')

<div>
    <div>
        <div class="p-8 bg-gradient-to-r from-green-300 to-green-100 rounded-xl shadow-md border">

            <div class="form-title text-2xl font-bold text-gray-800 mb-4" style="text-align: center; font-size: 30px">
                Registrar Partido
            </div>

            <div class="results-table">
                <form class="player-form" action="{{ route('partidos.store') }}" method="POST">
                    @csrf

                    <label for="id_torneo" style="font-size: 16px; color: black">Torneo</label>
                    <select id="id_torneo" name="id_torneo" class="input-label" required>
                        <option value="" selected>Selecciona un torneo</option>
                        @foreach ($torneo as $torneo)
                            <option value="{{ $torneo->id }}">{{ $torneo->nombre_torneo }}</option>
                        @endforeach
                    </select>

                    <label for="id_equipo_local" style="font-size: 16px; color: black">Equipo Local</label>
                    <select id="id_equipo_local" name="id_equipo_local" class="input-label" required>
                        <option value="" selected>Selecciona un equipo</option>
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option>
                        @endforeach
                    </select>

                    <label for="id_equipo_visitante" style="font-size: 16px; color: black">Equipo Visitante</label>
                    <select id="id_equipo_visitante" name="id_equipo_visitante" class="input-label" required>
                        <option value="" selected>Selecciona un equipo</option>
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option>
                        @endforeach
                    </select>

                    <label for="fecha" style="font-size: 16px; color: black">Fecha</label>
                    <input type="date" id="fecha" name="fecha" class="input-date" required>

                    <label for="hora" style="font-size: 16px; color: black">Hora</label>
                    <input type="time" id="hora" name="hora" class="input-time" required>

                    <label for="id_instalacion" style="font-size: 16px; color: black">Instalación</label>
                    <select id="id_instalacion" name="id_instalacion" class="input-label" required>
                        <option value="" selected>Selecciona una instalación</option>
                        @foreach ($instalaciones as $instalacion)
                            <option value="{{ $instalacion->id }}">{{ $instalacion->nombre_instalacion }}</option>
                        @endforeach
                    </select>

                    
                    <button type="submit" class="save-button">
                        Guardar
                    </button>

                    <button type="button" class="cancel-button" onclick="window.location.href='{{ route('partidos.read') }}'">
                        Cancelar
                    </button>   
                    

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
