@extends('layouts.dashboard')
@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/registrarequipo.css') }}">
@endsection

@section('content')

<div class="container">
    <h1>Editar Jugador</h1>
    <br>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

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
