@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/dashboard.css') }}">
    <style>
        .team-container {
            margin: 20px;
            font-family: Arial, sans-serif;
        }

        .players-list table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .players-list th, .players-list td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .players-list th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .btn-action {
            display: inline-block;
            padding: 8px 12px;
            margin: 2px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-action:hover {
            background-color: #0056b3;
        }

        .button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #218838;
        }
    </style>
@endsection

@section('content')
<div class="team-container">
    @if($equipo->jugadores->isNotEmpty())
        <div class="players-list">
            <table>
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($equipo->jugadores as $jugador)
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
                            <td>
                                <a href="{{route('arbitro.edit', ['id' => $jugador->id]) }}" class="btn-action">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>No hay jugadores disponibles para este equipo.</p>
    @endif

    <a href="{{ route('dashboard') }}" class="button">Volver al dashboard</a>
</div>



@endsection
