@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/detalle.css') }}">
@endsection

@section('content')
<div>
    <div class="p-8 bg-gradient-to-r from-white to-gray-500 rounded-xl shadow-md border border-blue-300">
        <div class="container">

            <h1 class="torneo-title">Torneo: {{ $torneo->nombre_torneo }}</h1>
            <p><b>Patrocinador:</b> {{ $torneo->patrocinador_torneo }}</p>
            <p><b>Número de equipos:</b> {{ $torneo->numero_equipos }}</p>
            <p><b>Estado:</b>
                <span style="color: {{ $torneo->finalizado ? 'red' : 'green'}}">
                    {{ $torneo->finalizado ? 'Finalizado' : 'En curso' }}
                </span>
            </p>
            <hr>

            <!-- Partidos por ronda -->
            @if($partidosPorRonda->isNotEmpty())
                @foreach($partidosPorRonda as $ronda => $partidos)
                    <div class="ronda-section">
                        <h2 class="ronda-title">Ronda: {{ $ronda }}</h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Equipo Local</th>
                                    <th>Equipo Visitante</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Instalación</th>
                                    <th>Ganador</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($partidos as $partido)
                                    <tr>
                                        <td class="ticket">{{ $partido->equipoLocal->nombre_equipo }}</td>
                                        <td class="ticket">{{ $partido->equipoVisitante->nombre_equipo }}</td>
                                        <td class="ticket">{{ $partido->fecha }}</td>
                                        <td class="ticket">{{ $partido->hora }}</td>
                                        <td class="ticket">{{ $partido->instalacion->nombre_instalacion ?? 'Por asignar' }}</td>
                                        <td class="ticket">
                                            @if($partido->finalizado)
                                                {{ $partido->ganador->nombre_equipo ?? 'Empate' }}
                                            @else
                                                <span style="color: green; ">En progreso</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$partido->finalizado)
                                                <a href="{{ route('partidos.mandarresultado', $partido->id) }}" class="concluir">Concluir</a>
                                            @else
                                                <p>Resultado Finalizado</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            @else
                <p>No hay partidos programados para este torneo.</p>
            @endif

            <!-- Botones de acciones -->
            @if(!$torneo->finalizado)
                <div class="action-buttons">
                    <form action="{{ route('torneos.avanzarRonda', $torneo->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="next-button">Avanzar a la siguiente ronda</button>
                    </form>
                    <form action="{{ route('torneo.finalizar', $torneo->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="finish-button">Finalizar Torneo</button>
                    </form>
                </div>
            @endif

            <!-- Mostrar ganador del torneo -->
            @if($torneo->finalizado && $ganador)
                @php
                    $equipoGanador = \App\Models\Equipo::find($ganador);
                @endphp
                <div class="alert alert-success">
                    <h3 style="font-size: 25px; color:black">¡Equipo Ganador del Torneo!</h3>
                    <p style="font-size: 20px; color:black">★★  <strong>{{ $equipoGanador->nombre_equipo }}</strong>  ★★</p>
                    <img src="{{ asset('storage/escudos/' . $equipoGanador->escudos) }}" alt="Escudo del equipo ganador">
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Estilos CSS -->
@endsection
