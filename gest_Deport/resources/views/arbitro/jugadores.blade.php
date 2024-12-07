@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/jugadorarbitro.css') }}">
@endsection

@section('content')
<div class="p-8 bg-gradient-to-r from-white to-gray-500 rounded-xl shadow-md border border-blue-300">
    <div class="team-container">
        <h1 class="title">Jugadores</h1>

        @if ($equipo->jugadores->isNotEmpty())
            <div class="players-list">
                <table>
                    <thead>
                        <tr>
                            <th style="font-size: 16px; color:black">Nombre</th>
                            <th style="font-size: 16px; color:black">Edad</th>
                            <th style="font-size: 16px; color:black">Posición</th>
                            <th style="font-size: 16px; color:black">Equipo</th>
                            <th style="font-size: 16px; color:black">Puntos</th>
                            <th style="font-size: 16px; color:black">Asistencias</th>
                            <th style="font-size: 16px; color:black">Tarjetas Amarillas</th>
                            <th style="font-size: 16px; color:black">Tarjetas Rojas</th>
                            <th style="font-size: 16px; color:black">Faltas</th>
                            <th style="font-size: 16px; color:black">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipo->jugadores as $jugador)
                            <tr>
                                <td class="ticket">{{ $jugador->nombre }}</td>
                                <td class="ticket">{{ $jugador->edad }}</td>
                                <td class="ticket">{{ $jugador->posicion }}</td>
                                <td class="ticket">{{ $jugador->id_equipo }}</td>
                                <td class="ticket">{{ $jugador->puntos }}</td>
                                <td class="ticket">{{ $jugador->asistencias }}</td>
                                <td class="ticket">{{ $jugador->tarjetas_amarillas }}</td>
                                <td class="ticket">{{ $jugador->tarjetas_rojas }}</td>
                                <td class="ticket">{{ $jugador->faltas }}</td>
                                <td>
                                    <a href="{{ route('arbitro.edit', ['id' => $jugador->id]) }}" class="btn-action">Editar</a>
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
</div>
@endsection
