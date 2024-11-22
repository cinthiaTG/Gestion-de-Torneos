@extends('layouts.dashboard')
@section('styles')
    <link rel="stylesheet" href="{{asset('Css/creartorneo.css')}}">
@endsection

@section('content')
    
<div class="results-table">
    <div class="form-title">Registrar Torneo</div>
    <form class="player-form" action="{{ route('torneo.store') }}" method="POST">
        @csrf
        <label>Nombre Torneo</label>
        <input type="text" name="nombre_torneo" required>

        <label>Tipo de Torneo</label>
        <input type="text" name="tipo_torneo" required>

        <label>Numero de Equipos</label><!---->
        <input type="int" name="numero_equipos" required>

        <label for="deporte_id">Deporte</label>
        <select class="input-label" id="deporte_id" name="deporte_id" required>
            <option value="" selected>Selecciona un deporte</option>
            <option value="1">Futbol Americano</option>
            <option value="2">Futbol Soccer</option>
            <option value="3">Volleyball</option>
            <option value="4">Basketball</option>
        </select>


        <button type="submit" class="save-button">Guardar</button>
    </form>
</div>

@endsection
