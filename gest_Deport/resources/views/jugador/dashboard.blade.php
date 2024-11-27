@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{asset('Css/dashboard.css')}}">
@endsection

@section('content')

<div class="card-container">

    <a href="{{route('jugador.desempeño')}}" class="card">
        <div class="card-label">Consultar Desempeño</div>
    </a>

    <a href="#" class="card">
        <div class="card-label">Torneos Disponibles</div>
        
    <a href="#" class="card">
        <div class="card-label">Estadisticas Equipo</div>
    </a>


</div>
@endsection
