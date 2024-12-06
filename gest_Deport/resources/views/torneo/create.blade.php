@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('Css/creartorneo.css') }}">
@endsection

@section('content')
    <div>
        <div>

            
            <div class="p-8 bg-gradient-to-r from-red-200 to-purple-100 rounded-xl shadow-md border">
                
                <div class="form-title text-2xl font-bold text-gray-800 mb-4" style="text-align: center; font-size: 30px">Crear Torneo</div>
            
                            
                <form class="player-form" action="{{ route('torneo.store') }}" method="POST">
                    @csrf

                    <label style="font-size: 16px; color: black">Nombre Torneo</label>
                    <input type="text" maxlength="20" name="nombre_torneo" required>

                    <label for="patrocinador_torneo" style="font-size: 16px; color: black">Patrocinador del Torneo</label>
                    <input type="text" maxlength="20" id="patrocinador_torneo" name="patrocinador_torneo">
                    <br class="jump">

                    <label for="monto_patrocinador" style="font-size: 16px; color: black">Monto patrocinador</label>
                    <input type="number" max="1000000" id="monto_patrocinador" name="monto_patrocinador">
                    <br class="jump">

                    <div class="mb-3">
                        <label for="numero_equipos" style="font-size: 16px; color: black" class="form-label">Número de Equipos</label>
                        <select name="numero_equipos" id="numero_equipos" class="form-control" required>
                            <option value="4">4</option>
                            <option value="8">8</option>
                            <option value="16">16</option>
                        </select>
                    </div>


                    <button type="submit" class="save-button">
                        Actualizar
                    </button>

                    <button type="button" class="cancel-button" onclick="window.location.href='{{ route('torneo.read') }}'">
                        Cancelar
                    </button> 
                </form>
            </div>
        </div>
    </div>
@endsection
