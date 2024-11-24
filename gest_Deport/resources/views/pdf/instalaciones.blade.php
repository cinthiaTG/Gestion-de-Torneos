@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Instalaciones</h1>

        @if($instalaciones->isEmpty())
            <p>No hay instalaciones registradas.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Deporte</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($instalaciones as $instalacion)
                    <tr>
                        <td>{{ $instalacion->id }}</td>
                        <td>{{ $instalacion->nombre_instalacion }}</td>
                        <td>{{ $instalacion->ubicacion }}</td>
                        <td>{{ $instalacion->deporte->nombre ?? 'Sin deporte' }}</td>
                        <td>
                            <a href="{{ route('instalacion.edit', $instalacion->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('instalacion.destroy', $instalacion->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
