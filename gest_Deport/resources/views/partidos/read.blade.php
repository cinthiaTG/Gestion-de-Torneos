@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/registrarequipo.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>Lista de Partidos</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Torneo</th>
                <th>Equipo Local</th>
                <th>Equipo Visitante</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Lugar</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partidos as $partido)
                <tr>
                    <td>{{ $partido->id }}</td>
                    <td>{{ $partido->torneo->nombre_torneo }}</td>
                    <td>{{ $partido->equipoLocal->nombre_equipo }}</td>
                    <td>{{ $partido->equipoVisitante->nombre_equipo }}</td>
                    <td>{{ $partido->fecha }}</td>
                    <td>{{ $partido->hora }}</td>
                    <td>{{ $partido->lugar }}</td>
                    <td>
                        <a href="{{ route('partidos.edit', $partido->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('partidos.destroy', $partido->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
