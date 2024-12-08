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
                    <input type="text" maxlength="70" name="nombre" required>

                    <label>Email</label>
                    <input type="email" name="email" required> <!-- Nuevo campo para el correo -->

                    <label>Edad</label>
                    <input type="number" min="5" max="100" name="edad" required>



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
