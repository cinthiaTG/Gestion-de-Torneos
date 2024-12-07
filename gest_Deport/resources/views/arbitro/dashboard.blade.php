@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/dashboard2.css') }}">
@endsection

@section('content')
    <div class="container">
        <!-- Fila de títulos -->
        <div class="titles-row">
            <h2 class="title">Torneos Activos</h2>
            <h2 class="title">Torneos Inactivos</h2>
            <h2 class="title">Equipos</h2>
        </div>

        <div class="content-row">
            <div class="column">
                @if(isset($torneos) && $torneos->isNotEmpty())
                    <div class="card-list">
                        @foreach($torneos as $torneo)
                            <a href="{{ route('torneo.detalle', ['id' => $torneo->id]) }}" class="card">
                                <div class="card-content">
                                    <h3><b>{{ $torneo->nombre_torneo }}</b></h3>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="no-items">No hay torneos activos</p>
                @endif
            </div>

            <!-- Columna: Torneos Inactivos -->
            <div class="column">
                @if(isset($torneosInactivos) && $torneosInactivos->isNotEmpty())
                    <div class="card-list">
                        @foreach($torneosInactivos as $torneo)
                            <a href="{{ route('torneo.detalle', ['id' => $torneo->id]) }}" class="card">
                                <div class="card-content">
                                    <h3><b>{{ $torneo->nombre_torneo }}</b></h3>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="no-items">No hay torneos inactivos</p>
                @endif
            </div>

            <!-- Columna: Equipos -->
            <div class="column">
                @if(isset($equipos) && $equipos->isNotEmpty())
                    <div class="card-list">
                        @foreach($equipos as $equipo)
                            <a href="{{ route('arbitro.jugadores', ['id' => $equipo->id]) }}" class="card">
                                <div class="card-content">
                                    <h3><b>{{ $equipo->nombre_equipo }}</b></h3>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="no-items">No hay equipos disponibles</p>
                @endif
            </div>
        </div>
    </div>
@endsection
