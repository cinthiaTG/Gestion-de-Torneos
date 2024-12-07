@extends('layouts.dashboard')

@section('styles')
<link rel="stylesheet" href="{{ asset('Css/read.css') }}">
@endsection

@section('content')
<div class="container">
    <!-- Título de la sección -->
    <h1 class="form-title">Editar Instalación</h1>
    <a href="{{ route('instalacion.create') }}" class="btn btn-warning">Nuevo</a>


    <!-- Sección de resultados -->
    <div class="results-section">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre Instalación</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instalaciones as $instalacion)
                <tr>
                    <td>{{ $instalacion->nombre_instalacion }}</td>
                    <td>{{ $instalacion->ubicacion }}</td>
                    <td>
                        <!-- Botón de editar -->
                        <a href="{{ route('instalacion.edit', ['id' => $instalacion->id]) }}" class="btn btn-warning">Editar</a>

                        <!-- Botón de eliminar -->
                        <form action="{{ route('instalacion.destroy', ['id' => $instalacion->id]) }}" method="POST" style="display:inline;">
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
