@extends('layouts.plantilla')

@section('styles')
<link rel="stylesheet" href="{{ asset('/Css/ranking.css') }}">
@endsection

@section('content')
    <div class="rankings-container">
        
        <!-- ranking de eqps -->
        <section class="team-ranking">
            <h2>Ranking de Equipos</h2>
            <table class="ranking-table">
                <thead>
                    <tr>
                        <th>Posición</th>
                        <th>Equipo</th>
                        <th>Puntos</th>
                        <th>Partidos Ganados</th>
                        <th>Partidos Perdidos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Equipo A</td>
                        <td>45</td>
                        <td>15</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Equipo B</td>
                        <td>34</td>
                        <td>12</td>
                        <td>9</td>
                    </tr>
                    {{--aqui se agregaran las filas de la base de dtos de cada equipo con su posicion, equipo, ... --}}
                </tbody>
            </table>
        </section>

        <!--estadisticas de los jugadores -->
        <section class="player-stats">
            <h2>Ranking de Jugadores</h2>
            <table class="stats-table">
                <thead>
                    <tr>
                        <th>Jugador</th>
                        <th>Equipo</th>
                        <th>Goles</th>
                        <th>Asistencias</th>
                        <th>Targetas Amarillas</th>
                        <th>Targetas Rojas</th>
                        <th>Partidos Jugados</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>J1</td>
                        <td>Equipo A</td>
                        <td>10</td>
                        <td>8</td>
                        <td>2</td>
                        <td>3</td>
                        <td>20</td>
                    </tr>
                    {{-- agg filas de jugadores de la base de datos --}}
                </tbody>
            </table>
        </section>

    </div>

@endsection
