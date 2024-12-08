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
        <h1>Estadísticas del Equipo</h1>
        <h2>{{ $equipo->nombre_equipo }}</h2>
        <a href="{{ asset('storage/escudos/' . $equipo->escudos) }}" target="_blank">
            <img src="{{ asset('storage/escudos/' . $equipo->escudos) }}" alt="Escudo del equipo" style="width: 100px; height: auto;">
        </a>

        <p><strong>Patrocinador:</strong> {{ $equipo->patrocinador_equipo }}</p>
        <p><strong>Monto del Patrocinio:</strong> ${{ number_format($equipo->monto_patrocinador, 2) }}</p>

    </body>
@endsection
