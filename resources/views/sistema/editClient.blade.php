@extends('adminlte::page')

@section('title', 'Nodos')

@section('content_header')
    <h1>ADMINISTRACION DE CLIENTES</h1>
@stop

@section('content')
    <p>Ingrese la infromacion del cleinte</p>
    <div class="card">
        <div class="card-body">
            <Form action="{{ route('cliente.update', $cliente) }}" method="POST">
                @csrf
                @method('PUT')
                <x-adminlte-input type="text" name="nombre" label="nombre" value="{{ $cliente->nombre }}"
                    label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="apellido" label="apellido" value="{{ $cliente->apellido }}"
                    label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="telefono" label="telefono" value="{{ $cliente->telefono }}"
                    label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="email" name="email" label="email" value="{{ $cliente->email }}"
                    label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-button type="submit" label="Actualizar" theme="primary" icon="fas fa-save" />
            </Form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @if (session('message'))
        <script>
            $(document).ready(function() {
                let mensaje = "{{ session('message') }}";
                Swal.fire({
                    'title': 'Resultado',
                    'text': mensaje,
                    'icon': 'success'
                })
            })
        </script>
    @endif
@stop
