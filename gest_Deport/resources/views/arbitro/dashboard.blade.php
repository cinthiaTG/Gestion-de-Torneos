@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/dashboard.css') }}">
@endsection

@section('content')
<div class="card-container">

    <!-- Verifica si hay equipos -->
    @if(isset($equipos) && $equipos->isNotEmpty())
    @foreach($equipos as $equipo)
        <a href="{{ route('arbitro.jugadores', ['id' => $equipo->id]) }}" class="card">
            <div class="card-label">
                {{ $equipo->nombre_equipo }}
            </div>
        </a>
    @endforeach
    @else
        <div class="card">
            <div class="card-label">No hay equipos disponibles</div>
        </div>
    @endif
</div>
@endsection
