    @extends('layouts.dashboard')

    @section('styles')
        <link rel="stylesheet" href="{{ asset('Css/dashboard2.css') }}">
    @endsection



    @section('content')

        <div class="card-container">
            <!-- Torneos Activos -->
            @if(isset($torneos) && $torneos->isNotEmpty())
                <div class="section-card">
                    <div class="section-header">
                        <h2 class="title">Torneos Activos</h2>
                    </div>
                    <div class="card-list">
                        @foreach($torneos as $torneo)
                            <a href="{{ route('torneo.detalle', ['id' => $torneo->id]) }}" class="card">
                                <div class="card-content">
                                    <h3><b>{{ $torneo->nombre_torneo }}</b></h3>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="section-card">
                    <div class="section-header">
                        <h2 class="title">No hay torneos activos</h2>
                    </div>
                </div>
            @endif

            <!-- Torneos Inactivos -->
            @if(isset($torneosInactivos) && $torneosInactivos->isNotEmpty())
                <div class="section-card">
                    <div class="section-header">
                        <h2 class="title">Torneos Inactivos</h2>
                    </div>
                    <div class="card-list">
                        @foreach($torneosInactivos as $torneo)
                            <a href="{{ route('torneo.detalle', ['id' => $torneo->id]) }}" class="card">
                                <div class="card-content">
                                    <h3>{{ $torneo->nombre_torneo }}</h3>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="section-card">
                    <div class="section-header">
                        <h2 class="title">No hay torneos inactivos</h2>
                    </div>
                </div>
            @endif

            <!-- Equipos -->
            @if(isset($equipos) && $equipos->isNotEmpty())
                <div class="section-card">
                    <div class="section-header">
                        <h2 class="title">Equipos</h2>
                    </div>
                    <div class="card-list">
                        @foreach($equipos as $equipo)
                            <a href="{{ route('arbitro.jugadores', ['id' => $equipo->id]) }}" class="card">
                                <div class="card-content">
                                    <h3>{{ $equipo->nombre_equipo }}</h3>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="section-card">
                    <div class="section-header">
                        <h2 class="title">No hay equipos disponibles</h2>
                    </div>
                </div>
            @endif
        </div>

    @endsection
