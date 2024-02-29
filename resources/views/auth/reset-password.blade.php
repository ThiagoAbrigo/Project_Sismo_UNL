<x-guest-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
            integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    </head>

    <body>
        <div id="logreg-forms">
            <form class="form-signin" method="POST" action="{{ route('password.update') }}">
                @csrf
                <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"><strong>Reestablecimiento de
                        contraseña</strong></h1>
                <x-validation-errors class="mb-4" />
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <input id="email" class="form-control" type="email" name="email"
                    :value="old('email', $request - > email)" required autofocus autocomplete="username"
                    placeholder="Ingresar correo existente">
                <input type="password" id="password" name="password" class="form-control" placeholder="contraseña"
                    required="">
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                    placeholder="confirmar contraseña" required="">

                <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-lock"></i>
                    Reestablecer Contraseña</button>
                <hr>
            </form>
        </div>
    </body>
</x-guest-layout>

{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
