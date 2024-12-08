@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/estadisticas_equipo.css') }}">
@endsection


@section('content')
<div class="container">
    <div class="header">
        <h1>Estadísticas del Equipo</h1>
        <strong>{{ $equipo->nombre_equipo }}</strong>
        <a href="{{ asset('storage/escudos/' . $equipo->escudos) }}" target="_blank">
            <img src="{{ asset('storage/escudos/' . $equipo->escudos) }}" alt="Escudo del equipo">
        </a>
        <p><strong>Patrocinador:</strong> {{ $equipo->patrocinador_equipo }}</p>
        <p><strong>Monto del Patrocinio:</strong> ${{ number_format($equipo->monto_patrocinador, 2) }}</p>
    </div>

    <div class="stats-grid">
        @forelse($partidosFinalizados as $partido)
            <div class="stats-card">
                <img src="{{ asset('storage/escudos/' . ($partido->equipoLocal->escudos ?? 'default.png')) }}" alt="Escudo del equipo local">
                <strong>Local:</strong> {{ $partido->equipoLocal->nombre_equipo ?? 'N/A' }}<br>
                <img src="{{ asset('storage/escudos/' . ($partido->equipoVisitante->escudos ?? 'default.png')) }}" alt="Escudo del equipo visitante">
                <strong>Visitante:</strong> {{ $partido->equipoVisitante->nombre_equipo ?? 'N/A' }}<br>
                <strong>Ganador:</strong> {{ $partido->ganador->nombre_equipo ?? 'Empate' }}
            </div>
        @empty
            <p class="text-center">No hay partidos finalizados para mostrar.</p>
        @endforelse
    </div>
</div>
@endsection
