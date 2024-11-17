@extends('layouts.dashboard')
@section('styles')
<link rel="stylesheet" href="{{ asset('Css/editarequipo.css') }}">
@endsection

@section('content')

<div class="container">
    <h1 class="form-title">Editar Equipo</h1>
    <div class="results-section">
        <br>
        <table class="results-table">
            <thead>
                <tr>
                    <th>Nombre del Equipo</th>
                    <th>Logo</th>
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
                    <td>
                        <a href="{{ route('equipos.edit', $equipo->id) }}">
                            <button class="edit-button">Editar</button>
                        </a>
                        <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="quit-button">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
