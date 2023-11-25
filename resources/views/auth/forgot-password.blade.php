<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-crema">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }} " class="mt-3 mb-6">
            @csrf
            
            <div class="flex flex-col text-crema font-gothamBold p-2 items-center w-full">
                <p class="font-gothamBold text-base">RESTABLECER CONTRASEÑA</p>

                <div class="flex flex-row items-center text-center rounded-full overflow-hidden border border-crema mt-2 w-full">
                    <img src="{{ asset('assets/img/Sobre.png') }}" alt="Email logo" class="inputImg ml-3 h-8 p-1 ">
                    <x-input id="email" type="email" name="email" :value="old('email')"  placeholder="CORREO ELECTRONICO" required autofocus autocomplete="off" class="w-full h-full ml-3 text-crema placeholder-gray-400 font-gothamMedium text-sm"/>
                </div>
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button>
                    Restablecer contraseña
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
