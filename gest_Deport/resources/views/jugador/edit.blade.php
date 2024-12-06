@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/registrarjugadores.css') }}">
@endsection

@section('content')
    <div>
        <div>
            <div class="p-8 bg-gradient-to-r from-orange-400 to-orange-200 rounded-xl shadow-md border border-orange-300">

                <div class="form-title text-2xl font-bold text-gray-800 mb-4" style="text-align: center; font-size: 30px">Actualizar Jugador</div>

                <form class="player-form" action="{{ route('jugadores.update', $jugador->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nombre Completo -->
                    <label style="font-size: 16px">Nombre Completo</label>
                    <input type="text" name="nombre" maxlength="50" value="{{ $jugador->nombre }}" required>

                    <!-- Edad -->
                    <label style="font-size: 16px">Edad</label>
                    <input type="number" name="edad" value="{{ $jugador->edad }}" min="0" max="100" required>

                    <!-- Posición -->
                    <label style="font-size: 16px">Posición</label>
                    <input type="text" name="posicion" maxlength="20" value="{{ $jugador->posicion }}" required>

                    <br class="jump">

                    <button type="submit" class="save-button">
                        Actualizar
                    </button>

                    <a href="{{ route('jugador.read') }}">
                        <button type="submit" class="cancel-button">
                        Cancelar
                    </button>
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
