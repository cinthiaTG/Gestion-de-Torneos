@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/dashboard.css') }}">
@endsection

@section('content')
<div class="card-container">
    <a href="{{ route('jugador.desempeño') }}" class="card">
        <div class="card-label">Consultar Desempeño</div>
    </a>
    
    @if(isset($jugadores) && $jugadores->isNotEmpty())
    @foreach($jugadores as $jugador)
        @if($jugador->equipo) 
        <a href="{{ route('arbitro.jugadores', ['id' => $jugador->equipo->id]) }}" class="card">
            <div class="card-label">
                {{ $jugador->equipo->nombre_equipo }} - Estadísticas
            </div>
        </a>
        @endif
    @endforeach
@else
    <div class="card">
        <div class="card-label">No hay jugadores disponibles</div>
    </div>
@endif

</div>
@endsection
