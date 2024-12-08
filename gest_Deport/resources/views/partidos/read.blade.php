@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/read.css') }}">
@endsection

@section('content')
<div class="form-title">Lista de Partidos</div>

    <a href="{{ route('partidos.create') }}">
        <button class="torneo-register">
            Registrar un partido
        </button>
    </a>

    <div class="results-section">
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
                <th>instalacion</th>
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
                    <td>{{ $partido->instalacion->nombre_instalacion }}</td>
                    <td>
                    {{-- <a href="{{ route('partidos.edit', $partido->id) }}" class="btn btn-warning btn-sm">Editar</a> --}}
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


