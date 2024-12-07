@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/registrarjugadores.css') }}">
@endsection

@section('content')
    <div>
        <div>
            <div class="p-8 bg-gradient-to-r from-blue-200 to-blue-100 rounded-xl shadow-md border border-blue-300">
                <div class="form-title text-2xl font-bold text-gray-800 mb-4">Registrar Jugador</div>

                <form class="player-form" action="{{ route('jugadores.store') }}" method="POST">
                    @csrf
                    <label>Nombre Completo</label>
                    <input type="text" name="nombre" required>

                    <label>Email</label>
                    <input type="email" name="email" required> <!-- Nuevo campo para el correo -->

                    <label>Edad</label>
                    <input type="number" name="edad" required>


                    <label for="equipo_id">Equipo</label>
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
