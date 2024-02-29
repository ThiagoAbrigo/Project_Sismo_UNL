@extends('adminlte::page')

@section('title', 'Nodos')

@section('content_header')
    <h1 style="text-align: center"><strong>ACTUALIZAR NODO</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <Form action="{{ route('nodos.update', $nodo) }}" method="POST">
                @csrf
                @method('PUT')
                <x-adminlte-input type="text" name="nombre" label="Nombre del nodo" value="{{ $nodo->name }}"
                    label-class="text-black">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-map-marker text-red"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="descripcion" label="Descripción del nodo"
                    value="{{ $nodo->description }}" label-class="text-black">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-map-marker text-red"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="latitud" label="Latitud del nodo" value="{{ $nodo->latitude }}"
                    label-class="text-black">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-map-marker text-red"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="longitud" label="Longitud del nodo" value="{{ $nodo->longitude }}"
                    label-class="text-black">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-map-marker text-red"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-select name="tipo" label="Tipo del nodo" label-class="text-black" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fa fa-chevron-down text-red"></i>
                        </div>
                    </x-slot>
                    <option value="auxiliar" {{ $nodo->tipo_nodo === 'auxiliar' ? 'selected' : '' }}>auxiliar</option>
                    <option value="destino" {{ $nodo->tipo_nodo === 'destino' ? 'selected' : '' }}>destino</option>
                </x-adminlte-select>
                <x-adminlte-button type="submit" label="Guardar" theme="success" icon="fas fa-save" />
                <a href="{{ route('nodos.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Atras</a>
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
                    'title': 'Nodo Actualizado',
                    'text': mensaje,
                    'icon': 'success'
                })
            })
        </script>
    @endif
@stop
