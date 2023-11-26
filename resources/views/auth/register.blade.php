<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-input id="name" placeholder="Usuario" class="block mt-1 w-full placeholder-gray-400 rounded " type="text" name="name" :value="old('name')" required autofocus autocomplete="off" />
            </div>

            <div class="mt-4">
                <x-input id="email" placeholder="Email" class="block mt-1 w-full placeholder-gray-400 rounded" type="email" name="email" :value="old('email')" required autocomplete="off" />
            </div>

            <div class="mt-4">
                <x-input id="password" placeholder="Contraseña" class="block mt-1 w-full placeholder-gray-400 rounded" type="password" name="password" required autocomplete="off" />
            </div>

            <div class="mt-4">
                <x-input id="password_confirmation" placeholder="Confirmar contraseña" class="block mt-1 w-full placeholder-gray-400 rounded" type="password" name="password_confirmation" required autocomplete="off" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{-- {{ __('Already registered?') }} --}}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
