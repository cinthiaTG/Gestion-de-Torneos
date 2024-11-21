@extends('layouts.dashboard')
@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/editarjugador.css') }}">
@endsection

@section('content')
<div class="container">
    <h1 class="form-title">Editar Instalacion</h1>
    <div class="results-section">
        <br>
        <table class="results-table">
            <thead>
                <tr>
                    <th>Nombre Instalacion</th>
                    <th>Ubicacion</th>
                    {{-- <th>Puntos</th>
                    <th>Asistencias</th>
                    <th>Tarjetas Amarillas</th>
                    <th>Tarjetas Rojas</th>
                    <th>Faltas</th> --}}
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instalaciones as $instalacion)
                <tr>
                    <td>{{ $instalacion->nombre_instalacion }}</td>
                    <td>{{ $instalacion->ubicacion }}</td>
                    {{-- <td>{{ $jugador->puntos }}</td>
                    <td>{{ $jugador->asistencias }}</td>
                    <td>{{ $jugador->tarjetas_amarillas }}</td>
                    <td>{{ $jugador->tarjetas_rojas }}</td>
                    <td>{{ $jugador->faltas }}</td> --}}
                    <td>
                        <a href="{{ route('instalacion.edit', ['id' => $instalacion->id]) }}"><button class="edit-button">Editar</button></a>
                        <form action="{{ route('instalacion.destroy', ['id' => $instalacion->id]) }}" method="POST" style="display:inline;">
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
