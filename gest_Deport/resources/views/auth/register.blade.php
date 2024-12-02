<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-blue-600">Regístrate en Sportivo</h2>
        <p class="text-sm text-gray-500 text-center mt-2">
            Completa el formulario para crear una cuenta.
        </p>

        <form method="POST" action="{{ route('register') }}" class="mt-6">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nombre Completo')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Role Selection -->
            <div class="mt-4">
                <x-input-label for="rol" :value="__('Rol')" />
                <select id="rol" name="rol_id" class="block mt-1 w-full rounded border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled selected>{{ __('Selecciona un rol') }}</option>
                    @foreach ($roles as $role)
                        @if (in_array($role->id, [1, 2, 4]))
                            <option value="{{ $role->id }}">{{ $role->nombre_rol }}</option>
                        @endif
                    @endforeach

                </select>
                <x-input-error :messages="$errors->get('rol_id')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="text-sm text-blue-600 hover:underline" href="{{ route('login') }}">
                    {{ __('¿Ya tienes cuenta? Inicia sesión') }}
                </a>

                <x-primary-button class="ml-3 bg-blue-600 hover:bg-blue-700">
                    {{ __('Registrarse') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
