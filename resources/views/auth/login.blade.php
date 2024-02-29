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
            <form class="form-signin"method="POST" action="{{ route('login') }}">
                @csrf
                <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"><strong>INICIAR SESIÓN</strong></h1>
                <x-validation-errors class="mb-4" />
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <input type="email" id="email" name="email" class="form-control"
                    placeholder="Correo electrónico" required="" autofocus="">
                <input type="password" id="password" name="password" class="form-control" placeholder="contraseña"
                    required="">

                <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Iniciar
                    sesión</button>
                <a href="{{ route('password.request') }}" id="forgot_pswd">olvidaste tu cuenta?</a>
                <hr>
                <!-- <p>Don't have an account!</p>  -->
                <a href="{{ route('register') }}" class="btn btn-primary btn-block"
                    style="text-decoration: none; color: white; cursor: pointer; display: inline-block; padding: .375rem .75rem; font-size: 1rem; line-height: 1.5; background-color: #007bff; border: 1px solid #007bff; border-radius: .25rem; transition: opacity 0.3s;">
                    <i class="fas fa-user-plus"></i> Crear cuenta nueva
                </a>
            </form>
        </div>
    </body>
    {{-- <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
            <div>
                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card> --}}
</x-guest-layout>
