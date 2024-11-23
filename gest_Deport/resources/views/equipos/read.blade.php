@extends('layouts.dashboard')
@section('styles')
<link rel="stylesheet" href="{{ asset('Css/read.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="form-title">Equipos Registrados</div>
    <div class="results-section">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre del Equipo</th>
                    <th>Logo</th>
                    <th>Patrocinador</th>
                    <th>Monto patrocinador</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->nombre_equipo }}</td>
                    <td>
                        <img src="{{ asset('storage/logos/' . $equipo->logo) }}" alt="Logo del equipo" class="team-logo">
                    </td>
                    <td>{{$equipo->patrocinador_equipo}}</td>
                    <td>{{$equipo->monto_patrocinador}}</td>
                    <td>
                        <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
