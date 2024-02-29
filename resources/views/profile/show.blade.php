@extends('adminlte::page')

@section('title', 'Nodos')

@section('content_header')
    <h1 style="text-align: center"><strong>INFORMACIÓN PERSONAL</strong></h1>
@stop

@section('content')
    <div class="card bg-gray-100 rounded-lg shadow-lg">
        <div class="card-body" style="background-color: rgb(234, 234, 234)">
            <x-app-layout>

                <div>
                    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                            @livewire('profile.update-profile-information-form')

                            <x-section-border />
                        @endif

                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                            <div class="mt-10 sm:mt-0">
                                @livewire('profile.update-password-form')
                            </div>

                            <x-section-border />
                        @endif

                        {{-- @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.two-factor-authentication-form')
                    </div>

                    <x-section-border />
                @endif --}}

                        {{-- <div class="mt-10 sm:mt-0">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div> --}}

                        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                            <div class="mt-10 sm:mt-0">
                                @livewire('profile.delete-user-form')
                            </div>
                        @endif
                    </div>
                </div>
            </x-app-layout>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
