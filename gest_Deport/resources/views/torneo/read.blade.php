@extends('layouts.dashboard')
@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/read.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="form-title">Registro de Torneos</div>
    <br>

    <a href="{{ route('torneo.create') }}">
        <button class="torneo-register">
            Crear un Torneo
        </button>
    </a>

    <div class="results-section">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre Torneo</th>
                    <th>Numero de Equipos</th>
                    <th>Nombre Patrocinador</th>
                    <th>Monto Patrocinado</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($torneo as $torneo)
                <tr>
                    <td class="date"><b>{{ $torneo->nombre_torneo }}</b></td>
                    <td class="date"><b>{{ $torneo->numero_equipos }}</b></td>
                    <td class="date"><b>{{$torneo->patrocinador_torneo}}</b></td>
                    <td class="date"><b>{{$torneo->monto_patrocinador}}</b></td>
                    <td>
                        <a href="{{ route('torneo.edit', ['id' => $torneo->id]) }}" class="btn btn-warning" style="font-weight: bold">Editar</a>
                        <form action="{{ route('torneo.destroy', ['id' => $torneo->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="font-weight: bold">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
