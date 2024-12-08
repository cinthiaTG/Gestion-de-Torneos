<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estadísticas del Equipo</title>
</head>
<body>
    <h1>Estadísticas del Equipo</h1>
    <h2>{{ $equipo->nombre_equipo }}</h2>
    <img src="{{ $equipo->escudo }}" alt="Escudo del equipo" style="width: 150px; height: auto;">
    <p><strong>Patrocinador:</strong> {{ $equipo->patrocinador_equipo }}</p>
    <p><strong>Monto del Patrocinio:</strong> ${{ number_format($equipo->monto_patrocinador, 2) }}</p>
    {{-- <p><strong>Partidos Jugados:</strong> {{ $equipo->partidos_jugados }}</p> --}}
{{-- <p><strong>Victorias:</strong> {{ $equipo->victorias }}</p>
<p><strong>Empates:</strong> {{ $equipo->empates }}</p>
<p><strong>Derrotas:</strong> {{ $equipo->derrotas }}</p>
<p><strong>Goles a Favor:</strong> {{ $equipo->goles_favor }}</p>
<p><strong>Goles en Contra:</strong> {{ $equipo->goles_contra }}</p>
<p><strong>Diferencia de Goles:</strong> {{ $equipo->diferencia_goles }}</p>
<p><strong>Puntos Totales:</strong> {{ $equipo->puntos }}</p> --}}
</body>
</html>
