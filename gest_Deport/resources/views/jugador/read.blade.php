@extends('layouts.dashboard')
@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/read.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="form-title">Jugadores Registrados</div>
    <a href="{{ route('jugadores.create') }}">
        <button class="torneo-register">
            Registrar Jugador
        </button>
    </a>
    
    <div class="results-section">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Posición</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jugadores as $jugador)
                <tr>
                    <td>{{ $jugador->nombre }}</td>
                    <td>{{ $jugador->edad }}</td>
                    <td>
                        @if($jugador->posicion == 1)
                            Portero
                        @elseif($jugador->posicion == 2)
                            Defensa
                        @elseif($jugador->posicion == 3)
                            Delantero
                        @elseif($jugador->posicion == 4)
                            Mediocampo
                        @else
                            Desconocido
                        @endif
                    </td>
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
