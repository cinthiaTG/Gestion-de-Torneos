@extends('layouts.dashboard')
@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/editarjugador.css') }}">
@endsection

@section('content')
<div class="container">
    <h1 class="form-title">Editar Jugador</h1>
    <div class="results-section">
        <br>
        <table class="results-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Edad</th>
                    <th>Posición</th>
                    {{-- <th>Puntos</th>
                    <th>Asistencias</th>
                    <th>Tarjetas Amarillas</th>
                    <th>Tarjetas Rojas</th>
                    <th>Faltas</th> --}}    
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
                    {{-- <td>{{ $jugador->puntos }}</td>
                    <td>{{ $jugador->asistencias }}</td>
                    <td>{{ $jugador->tarjetas_amarillas }}</td>
                    <td>{{ $jugador->tarjetas_rojas }}</td>
                    <td>{{ $jugador->faltas }}</td> --}}
                    <td>
                        <a href="{{ route('jugadores.edit', ['id' => $jugador->id]) }}"><button class="edit-button">Editar</button></a>
                        <form action="{{ route('jugadores.destroy', ['id' => $jugador->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="quit-button">Eliminar</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
