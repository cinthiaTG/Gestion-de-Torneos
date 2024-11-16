<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Mensaje de bienvenida -->
                    <div class="content">
                        <div class="welcome-message">
                            <span>Hola </span><span class="username">{{ auth()->user()->name }}</span>
                        </div>
                        <div class="sub-message">¿Qué buscas hacer hoy?</div>

                        <!-- Opciones principales -->
                        <div class="card-container">
                            <a href="#" class="card">
                                <div class="card-label0">Crear Torneo</div>
                            </a>
                            <a href="#" class="card">
                                <div class="card-label1">Registrar Equipo</div>
                            </a>
                            <a href="#" class="card">
                                <div class="card-label2">Registrar Jugador</div>
                            </a>
                        </div>

                        <!-- Historial -->
                        <div class="card-wrapper">
                            <div class="card"></div>
                        </div>
                        <div class="history-label">Consultar Historial<br>de Torneos</div>

                        <!-- Más opciones -->
                        <div class="flex-container">
                            <div class="card"></div>
                            <div class="card"></div>
                            <div class="card"></div>
                        </div>

                        <div class="card-container2">
                            <a href="#" class="card">
                                <div class="card-label3">Registrar Resultado</div>
                            </a>
                            <a href="#" class="card">
                                <div class="card-label4">Editar Equipo</div>
                            </a>
                            <a href="#" class="card">
                                <div class="card-label5">Editar Jugador</div>
                            </a>
                        </div>

                        <div class="card-container3">
                            <a href="#" class="card">
                                <div class="card-label6">Registrar Instalación</div>
                            </a>
                            <a href="#" class="card">
                                <div class="card-label7">Editar Instalación</div>
                            </a>
                            <a href="#" class="card">
                                <div class="card-label8">Consultar Historial de Torneos</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
