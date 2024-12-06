@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/registrarjugadores.css') }}">
@endsection

@section('content')
    <div>
        <div>
            <div class="p-8 bg-gradient-to-r from-orange-400 to-orange-200 rounded-xl shadow-md border border-orange-300">
               
                <div class="form-title text-2xl font-bold text-gray-800 mb-4" style="text-align: center; font-size: 30px">Crear Torneo</div>

                <form class="player-form" action="{{ route('jugadores.store') }}" method="POST">
                    @csrf
                    <label style="font-size: 16px">Nombre Completo</label>
                    <input type="text" name="nombre" required>
                    
                    <label style="font-size: 16px">Email</label>
                    <input type="email" name="email" required style="border: 1px solid black; border-radius: 5px"> <!-- Nuevo campo para el correo -->
                
                    <label style="font-size: 16px">Edad</label>
                    <input type="number" name="edad" required>
                
                    <label style="font-size: 16px">Posición</label>
                    <select class="input-label" id="posicion" name="posicion">
                        <option value="" selected>Selecciona una posición</option>
                        <option value="1">Portero</option>
                        <option value="2">Defensa</option>
                        <option value="3">Delantero</option>
                        <option value="4">Mediocampo</option>
                    </select>
                
                    <label for="equipo_id" style="font-size: 16px">Equipo</label>
                    <select name="equipo_id" required>
                        <option value="" selected>Selecciona un equipo</option>
                        @foreach(App\Models\Equipo::all() as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option>
                        @endforeach
                    </select>
                
                    <button type="submit" class="save-button">Guardar</button>
                </form>
                
            </div>
        </div>
    </div>
@endsection
