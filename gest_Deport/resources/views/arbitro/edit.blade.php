@extends('layouts.dashboard')
@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/registrarequipo.css') }}">
@endsection

@section('content')
    <div class="p-8 bg-gradient-to-r from-white to-gray-500 rounded-xl shadow-md border border-blue-300">
        <div class="container">
            <h1 class="form-title">Editar Jugador</h1>
            <br>
            @if (session('success'))
                <p class="text-green-500 font-bold">{{ session('success') }}</p>
            @endif

            <form class="player-form" action="{{ route('arbitro.update', $jugador->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre" style="font-size: 16px; color:black">Nombre Completo</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $jugador->nombre }}" required>
                </div>

                <div class="form-group">
                    <label for="edad" style="font-size: 16px; color:black">Edad</label>
                    <input type="number" name="edad" class="form-control" value="{{ $jugador->edad }}" required>
                </div>

                <div class="form-group">

                    <div class="form-group">
                        <label for="puntos" style="font-size: 16px; color:black">Puntos</label>
                        <input type="number" name="puntos" class="form-control" value="{{ $jugador->puntos }}" required>
                    </div>

                    <div class="form-group">
                        <label for="asistencias" style="font-size: 16px; color:black">Asistencias</label>
                        <input type="number" name="asistencias" class="form-control" value="{{ $jugador->asistencias }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="tarjetas_amarillas" style="font-size: 16px; color:black">Tarjetas Amarillas</label>
                        <input type="number" name="tarjetas_amarillas" class="form-control"
                            value="{{ $jugador->tarjetas_amarillas }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tarjetas_rojas" style="font-size: 16px; color:black">Tarjetas Rojas</label>
                        <input type="number" name="tarjetas_rojas" class="form-control"
                            value="{{ $jugador->tarjetas_rojas }}" required>
                    </div>

                    <div class="form-group">
                        <label for="faltas" style="font-size: 16px; color:black">Faltas</label>
                        <input type="number" name="faltas" class="form-control" value="{{ $jugador->faltas }}" required>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="actualizar">Actualizar</button>
                        <a href="{{ route('arbitro.jugadores', ['id' => $equipo->id]) }}"
                            class="btn-secondary">Cancelar</a>
                    </div>
            </form>
        </div>
    </div>
@endsection
