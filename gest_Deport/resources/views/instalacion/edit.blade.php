@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/creartorneo.css') }}">
@endsection

@section('content')
    <div>
        <div>
            <div class="p-8 bg-gradient-to-r from-gray-400 to-gray-500 rounded-xl shadow-md border border-blue-300">
                
                <div class="form-title text-2xl font-bold text-gray-800 mb-4" style="text-align: center; font-size: 30px">
                    Editar Instalación
                </div>

                @if(session('success'))
                    <p class="text-green-500 text-center font-medium">{{ session('success') }}</p>
                @endif

                <form class="player-form" action="{{ route('instalacion.update', $instalacion->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label for="nombre_instalacion" style="font-size: 16px; color: black">Nombre Instalación</label>
                    <input type="text" id="nombre_instalacion" name="nombre_instalacion" class="form-control" value="{{ $instalacion->nombre_instalacion }}" required>

                    <label for="ubicacion" style="font-size: 16px; color: black">Ubicación</label>
                    <input type="text" id="ubicacion" name="ubicacion" class="form-control" value="{{ $instalacion->ubicacion }}" required>

                    <button type="submit" class="save-button">Guardar</button>

                    <button type="button" class="cancel-button" onclick="window.location.href='{{ route('instalacion.read') }}'">
                        Cancelar
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
