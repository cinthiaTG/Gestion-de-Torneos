@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/creartorneo.css') }}">
@endsection

@section('content')

<div class="container">
    <h1>Editar Jugador</h1>
    <br>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

                <form class="player-form" action="{{ route('instalacion.update', $instalacion->id) }}" method="POST">
                    @csrf
                    @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre Instalacion</label>
            <input type="text" maxlength="50" name="nombre_instalacion" class="form-control" value="{{ $instalacion->nombre_instalacion }}" required>
        </div>

        <div class="form-group">
            <label for="apellido_paterno">Ubicacion</label>
            <input type="text" maxlength="50" name="ubicacion" class="form-control" value="{{ $instalacion->ubicacion }}" required>
        </div>

        <button type="submit" class="actualizar">Actualizar</button>
        <a href="{{route('instalacion.read')}}" class="btn btn-secondary">Cancelar</a>

    </form>
</div>


@endsection
