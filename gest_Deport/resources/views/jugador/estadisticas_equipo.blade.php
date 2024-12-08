@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/dashboard.css') }}">
@endsection

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Estadísticas del Equipo</title>
    </head>

    <body>
        @if (session('error'))
            <p class="alert alert-danger">{{ session('error') }}</p>
        @endif

        <strong>Estadísticas del Equipo</strong>
        <br>
        <strong>{{ $equipo->nombre_equipo }}</strong>
        <a href="{{ asset('storage/escudos/' . $equipo->escudos) }}" target="_blank">
            <img src="{{ asset('storage/escudos/' . $equipo->escudos) }}" alt="Escudo del equipo"
                style="width: 100px; height: auto;">
        </a>

        <p><strong>Patrocinador:</strong> {{ $equipo->patrocinador_equipo }}</p>
        <p><strong>Monto del Patrocinio:</strong> ${{ number_format($equipo->monto_patrocinador, 2) }}</p>

        <div class="row">
            @forelse($partidosFinalizados as $partido)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <p class="card-text">
                                <strong>Equipo Local:</strong>
                                {{ $partido->equipoLocal->nombre_equipo ?? 'N/A' }}<br>
                                <a href="{{ asset('storage/escudos/' . ($partido->equipoLocal->escudos ?? 'default.png')) }}"
                                    target="_blank">
                                    <img src="{{ asset('storage/escudos/' . ($partido->equipoLocal->escudos ?? 'default.png')) }}"
                                        alt="Escudo del equipo local" class="team-logo" width="50">
                                </a>
                                <strong>Equipo Visitante:</strong>
                                {{ $partido->equipoVisitante->nombre_equipo ?? 'N/A' }}<br>
                                <a href="{{ asset('storage/escudos/' . ($partido->equipoVisitante->escudos ?? 'default.png')) }}"
                                    target="_blank">
                                    <img src="{{ asset('storage/escudos/' . ($partido->equipoVisitante->escudos ?? 'default.png')) }}"
                                        alt="Escudo del equipo visitante" class="team-logo" width="50">
                                </a>
                                <strong>Ganador:</strong>
                                {{ $partido->ganador->nombre_equipo ?? 'Empate' }}<br>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No hay partidos finalizados para mostrar.</p>
            @endforelse
        </div>

    </body>
@endsection
