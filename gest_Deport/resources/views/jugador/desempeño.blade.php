@extends('layouts.dashboard')
@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/read.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="form-title">Desempeño</div>
    <div class="results-section">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Posición</th>
                    <th>equipo</th>
                    <th>Puntos</th>
                    <th>Asistencias</th>
                    <th>Targetas Amarillas</th>
                    <th>Targetas Rojas</th>
                    <th>Faltas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jugadores as $jugador)
                <tr>
                    <td>{{ $jugador->nombre }}</td>
                    <td>{{ $jugador->edad }}</td>
                    <td>{{ $jugador->posicion }}</td>
                    <td>{{ $jugador->id_equipo }}</td>
                    <td>{{ $jugador->puntos }}</td>
                    <td>{{ $jugador->asistencias }}</td>
                    <td>{{ $jugador->tarjetas_amarillas }}</td>
                    <td>{{ $jugador->tarjetas_rojas }}</td>
                    <td>{{ $jugador->faltas }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection