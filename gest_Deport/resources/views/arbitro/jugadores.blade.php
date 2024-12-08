@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/jugadorarbitro.css') }}">
@endsection

@section('content')
<div class="team-container">
    @if($equipo->jugadores->isNotEmpty())
        <div class="players-list">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>equipo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($equipo->jugadores as $jugador)
                        <tr>
                            <td>{{ $jugador->nombre }}</td>
                            <td>{{ $jugador->edad }}</td>
                            <td>{{ $jugador->id_equipo }}</td>
                            <td>
                                <a href="{{route('arbitro.edit', ['id' => $jugador->id]) }}" class="btn-action">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>No hay jugadores disponibles para este equipo.</p>
    @endif

        <a href="{{ route('dashboard') }}" class="button">Volver al dashboard</a>
    </div>
</div>
@endsection
