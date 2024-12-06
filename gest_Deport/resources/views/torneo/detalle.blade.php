@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Torneo: {{ $torneo->nombre_torneo }}</h1>
        <p>Patrocinador: {{ $torneo->patrocinador_torneo }}</p>
        <p>Número de equipos: {{ $torneo->numero_equipos }}</p>
        <p>Estado: {{ $torneo->finalizado ? 'Finalizado' : 'En curso' }}</p>
        <hr>

        @if($partidosPorRonda->isNotEmpty())
            @foreach($partidosPorRonda as $ronda => $partidos)
                <h2>Ronda: {{ $ronda }}</h2>
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
                            <td>{{ $partido->equipoLocal->nombre_equipo }}</td>
                            <td>{{ $partido->equipoVisitante->nombre_equipo }}</td>
                            <td>{{ $partido->fecha }}</td>
                            <td>{{ $partido->hora }}</td>
                            <td>{{ $partido->instalacion->nombre ?? 'Por asignar' }}</td>
                            <td>
                                @if($partido->finalizado)
                                    {{ $partido->ganador->nombre_equipo ?? 'Empate' }}
                                @else
                                    En progreso
                                @endif
                            </td>
                            <td>
                                @if(!$partido->finalizado)
                                    <a href="{{ route('partidos.mandarresultado', $partido->id) }}" class="btn btn-warning btn-sm">Concluir</a>
                                @else
                                    <p>Resultado Finalizado</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endforeach
        @else
            <p>No hay partidos programados para este torneo.</p>
        @endif

        <!-- Mostrar el botón para avanzar a la siguiente ronda solo si el torneo no está finalizado -->
        @if(!$torneo->finalizado)
            <form action="{{ route('torneos.avanzarRonda', $torneo->id) }}" method="POST">
                @csrf
                <button type="submit" class="button">Avanzar a la siguiente ronda</button>
            </form>

            <form action="{{ route('torneo.finalizar', $torneo->id) }}" method="POST">
                @csrf
                <button type="submit" class="button">Finalizar Torneo</button>
            </form>


        @endif


    </div>
    <style>
        /* General styles */
        .container {
            margin: 20px;
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
            padding-top: 20px; /* Añade espacio entre rondas */
        }

        p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        hr {
            margin: 20px 0;
            border: 1px solid #ddd;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        /* Button Styles */
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

        .button[style="background-color: #dc3545;"]:hover {
            background-color: #c82333;
        }

        /* Ganador Message Styles */
        .alert-success {
            text-align: center;
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #c3e6cb;
            margin-bottom: 20px;
        }

        .alert-success h3 {
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .alert-success p {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .alert-success p strong {
            font-size: 20px;
            color: #155724;
        }

        .alert-success img {
            width: 150px;  /* Ajusta el tamaño de la imagen */
            height: 150px;
            margin-top: 10px; /* Añade un margen para separar la imagen del texto */
            display: block;  /* Hace que la imagen sea un bloque y permita el centrado */
            margin-left: auto; /* Centra la imagen horizontalmente */
            margin-right: auto; /* Centra la imagen horizontalmente */
        }
    </style>

    <!-- Mostrar ganador solo si el torneo está finalizado -->
    @if($torneo->finalizado && $ganador)
        @php
            // Obtener el equipo completo usando el ID del ganador
            $equipoGanador = \App\Models\Equipo::find($ganador);
        @endphp

        <div class="alert alert-success">
            <h3>¡Equipo Ganador del Torneo!</h3>
            <p>★★  <strong>{{ $equipoGanador->nombre_equipo }}</strong>  ★★</p>
            <!-- Mostrar la imagen del equipo -->
            <img src="{{ asset('storage/escudos/' . $equipoGanador->escudos) }}" alt="Escudo del equipo ganador">
        </div>
    @endif


@endsection
