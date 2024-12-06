@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/creartorneo.css') }}">
@endsection

@section('content')
    <div>
        <div>
            <div class="p-8 bg-gradient-to-r from-red-200 to-purple-100 rounded-xl shadow-md border">

                <div class="form-title text-2xl font-bold text-gray-800 mb-4" style="text-align: center; font-size: 30px"">Actualizar Torneo</div>

                <form class="player-form" action="{{ route('torneo.update', $torneo->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Esto especifica que será una actualización -->

                    <label style="font-size: 16px; color: black">Nombre Torneo</label>
                    <input type="text" name="nombre_torneo" maxlength="20" value="{{ $torneo->nombre_torneo }}" required>

                    <label for="patrocinador_torneo" style="font-size: 16px; color: black">Patrocinador del Torneo</label>
                    <input type="text" id="patrocinador_torneo" maxlength="20" name="patrocinador_torneo" value="{{ $torneo->patrocinador_torneo }}">

                    <br class="jump">

                    <label for="monto_patrocinador" style="font-size: 16px; color: black">Monto patrocinador</label>
                    <input type="number" id="monto_patrocinador" name="monto_patrocinador" min="0" max="10000000" value="{{ $torneo->monto_patrocinador }}">

                    <br class="jump">


                    
                    <button type="submit" class="save-button">
                        Actualizar
                    </button>

                    <a href="{{ route('jugador.read') }}">
                        <button type="submit" class="cancel-button">
                        Cancelar
                    </button>
                    </a>

                </form>
            </div>
        </div>
    </div>
@endsection
