@extends('layouts.dashboard')
@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/read.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="form-title">Jugadores Registrados</div>
    <a href="{{ route('jugadores.create') }}" class="btn btn-warning">Nuevo</a>

    <div class="results-section">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Edad</th>
                    <th>Posición</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jugadores as $jugador)
                <tr>
                    <td>{{ $jugador->nombre }}</td>
                    <td>{{ $jugador->apellido_paterno }}</td>
                    <td>{{ $jugador->apellido_materno }}</td>
                    <td>{{ $jugador->edad }}</td>
                    <td>{{ $jugador->posicion }}</td>
                    <td>
                        <a href="{{ route('jugadores.edit', ['id' => $jugador->id]) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('jugadores.destroy', ['id' => $jugador->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection