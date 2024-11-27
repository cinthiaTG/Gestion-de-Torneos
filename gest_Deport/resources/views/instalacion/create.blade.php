@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/creartorneo.css') }}">
@endsection

@section('content')
    <div>
        <div>
            <div class="p-8 bg-gradient-to-r from-blue-200 to-blue-100 rounded-xl shadow-md border border-blue-300">
                <div class="form-title text-2xl font-bold text-gray-800 mb-4">Registrar Instalación</div>

                <form class="player-form" action="{{ route('instalacion.store') }}" method="POST">
                    @csrf
                    <label>Nombre Instalacion</label>
                    <input type="text" name="nombre_instalacion" required>

                    <label>Ubicacion</label>
                    <input type="text" name="ubicacion" required>

                    <label for="deporte_id">Deportes</label>
                    <select class="input-label" id="deporte_id" name="deporte_id" required>
                        <option value="" selected>Selecciona un deporte</option>
                        <option value="1">Futbol Americano</option>
                        <option value="2">Futbol Soccer</option>
                        <option value="3">Volleyball</option>
                        <option value="4">Basketball</option>
                    </select>

                    {{-- <label>Posicion</label>
                    <select class="input-label" id="posicion" name="posicion">
                        <option value="" selected>Selecciona una posicion</option>
                        <option value="1" selected >1</option>
            
                        <!-- Las opciones de posición se llenarán dinámicamente -->
                    </select>
            
                    <label for="equipo_id">Equipo</label>
                    <select name="equipo_id" required>
                        <option value="" selected>Selecciona un equipo</option> <!-- Opción en blanco al principio -->
                        @foreach (App\Models\Equipo::all() as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option> <!-- Todas las opciones seleccionadas por defecto -->
                        @endforeach
                    </select> --}}

                    {{-- <div class="section-title">Estadísticas</div>
                    <label>Puntos</label>
                    <input type="number" name="puntos" required>
            
                    <label>Asistencias</label>
                    <input type="number" name="asistencias" required>
            
                    <label>Tarjetas Rojas</label>
                    <input type="number" name="tarjetas_rojas" required>
            
                    <label>Tarjetas Amarillas</label>
                    <input type="number" name="tarjetas_amarillas" required>
            
                    <label>Faltas</label>
                    <input type="number" name="faltas" required> --}}

                    <button type="submit" class="save-button">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
