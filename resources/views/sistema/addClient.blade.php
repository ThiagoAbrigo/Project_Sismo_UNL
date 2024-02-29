@extends('adminlte::page')

@section('title', 'Nodos')

@section('content_header')
    <h1>ADMINISTRACION DE CLIENTES</h1>
@stop

@section('content')
    <p>Ingrese la infromacion del cleinte</p>
    @php
        if (session()) {
            if (session('message') == 'ok') {
                echo '<x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Done" dismissable>
                        cliente registrado
                        </x-adminlte-alert>';
            }
        }
    @endphp
    <div class="card">
        <div class="card-body">
            <Form action="{{ route('cliente.store') }}" method="POST">
                @csrf
                <x-adminlte-input type="text" name="nombre" label="nombre" placeholder="Ingrese su nombre"
                    label-class="text-lightblue" value="{{ old('nombre') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="apellido" label="apellido" placeholder="Ingrese su apellido"
                    label-class="text-lightblue" value="{{ old('apellido') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="telefono" label="telefono" placeholder="Ingrese su telefono"
                    label-class="text-lightblue" value="{{ old('telefono') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="email" name="email" label="email" placeholder="Ingrese su correo"
                    label-class="text-lightblue" value="{{ old('email') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save" />
            </Form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
