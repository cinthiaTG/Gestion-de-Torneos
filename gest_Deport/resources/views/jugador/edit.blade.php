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

        <div class="form-group">
            <label for="nombre">Nombre Completo</label>
            <input type="text" maxlength="70" name="nombre" class="form-control" value="{{ $jugador->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="edad">Edad</label>
            <input type="number" min="5" max="100" name="edad" class="form-control" value="{{ $jugador->edad }}" required>
        </div>

        <button type="submit" class="actualizar">Actualizar</button>
        <a href="{{route('jugador.read')}}" class="btn btn-secondary">Cancelar</a>

    </form>
</div>


@endsection
