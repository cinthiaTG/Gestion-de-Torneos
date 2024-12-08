@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/dashboard.css') }}">
@endsection

@section('content')
<div class="card-container">

    <!--
        solo aparecera un equipo ya que esta relacionada con el id_equipo y id de jugador

        tengo que modificar de que solo se vea el del id relacionado
    -->
    @if(isset($jugadores) && $jugadores->isNotEmpty())
        @foreach($jugadores as $jugador)
            <a href="{{ route('jugador.estadisticas_equipo', ['id' => $jugador->id_equipo]) }}" class="card">
                <div class="card-label">Estadísticas de equipos</div>
            </a>
        @endforeach
    @else
        <div class="card">
            <div class="card-label">No hay jugadores disponibles</div>
        </div>
    @endif
</div>
@endsection
