<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="m-4 p-0 flex flex-col justify-center">
            @csrf

            <div class="flex flex-row items-center text-center rounded-full overflow-hidden border border-crema focus:border-rosado focus:ring-rosado mb-2 ">
                <img src="{{ asset('assets/img/Usuarui.png') }}" alt="Logo usuario" class="inputImg ml-3 h-8 p-1" />
                
                <x-input id="email" type="email" name="email" :value="old('email')"  placeholder="Usuario" required autofocus autocomplete="off" class="w-full h-full ml-3 text-crema placeholder-gray-400"/>
            </div>              

            <div class="flex flex-row items-center text-center rounded-full overflow-hidden border border-crema mt-2">
                <img src="{{ asset('assets/img/Candado.png') }}" alt="Contraseña" class="inputImg ml-3 h-8 p-1 ">
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Contraseña" class="w-full h-full ml-3 text-crema placeholder-gray-400"/>
            </div>
            
            <div class=" flex flex-col items-end p-1 mt-1">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-crema rounded-md focus:outline-none focus:ring-1 focus:ring-rosado hover:text-blanco" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
            </div>
            
            <div class="flex flex-col mt-2 items-center ">
                <x-button class="ms-4 mt-2 items-center ">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
