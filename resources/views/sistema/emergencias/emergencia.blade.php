@extends('adminlte::page')

@section('title', 'Plan de emergencia')

@section('content_header')
    <h1 style="text-align: center"><strong>PLAN DE EMERGENCIA</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <Form action="{{ route('emergencias.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="estado" value="inactivo">
                <x-adminlte-input name="titulo" id="titulo" label="Título"
                    placeholder="Ingresar titulo del plan de emergencia" label-class="text-black">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-lightblue">
                            <i class="fa fa-text-width text-white"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <input type="file" name="file" id="file" label="Subir Archivo" igroup-size="sm"
                    placeholder="Elegir archivo" />
                <x-adminlte-button class="btn-flat" type="submit" label="Subir" theme="success"
                    icon="fas fa-lg fa-upload" />
            </Form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @php
                $heads = ['ID', ['label' => 'Título', 'width' => 20], 'Archivo', ['label' => 'Estado', 'width' => 20], ['label' => 'Actions', 'no-export' => true, 'width' => 10]];

                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

                $config = [
                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    ],
                ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                bordered compressed>
                @foreach ($emergencias as $emergencia)
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{{ $emergencia->id }}</td>
                        <td>{{ $emergencia->titulo }}</td>
                        <td>{{ $emergencia->file }}</td>
                        <td style="text-align: center; vertical-align: middle;">
                            <label class="switch">
                                <input type="checkbox" {{ $emergencia->estado == 'activo' ? 'checked' : '' }}
                                    data-id="{{ $emergencia->id }}" class="toggleEstado">
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            <form style="display: inline" action="{{ route('emergencias.destroy', $emergencia) }}"
                                method="POST" class="formEliminar">
                                @csrf
                                @method('DELETE')
                                {!! $btnDelete !!}
                            </form>
                            <a href="{{ url('/emergencies/' . $emergencia->id . '/download') }}"
                                class="btn btn-xs btn-default text-green mx-1 shadow" title="Descargar" target="_blank">
                                <i class="fa fa-lg fa-fw fa fa-arrow-down"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="{{ asset('css/emergencia.css') }}" rel="stylesheet">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Estas seguro de eliminar el archivo?",
                    icon: "error",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si"
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            })
        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggles = document.querySelectorAll('.toggleEstado');
            toggles.forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const estado = this.checked ? 'activo' : 'inactivo';
                    const id = this.dataset.id;
                    const message = this.checked ? '¿Estás seguro de cambiar el estado a activo?' :
                        '¿Estás seguro de cambiar el estado a inactivo?';
                    Swal.fire({
                        title: 'Confirmación',
                        text: message,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, cambiar estado',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const id = this.dataset.id;
                            fetch(`{{ route('cambiar_estado', ['id' => ':id']) }}`.replace(
                                    ':id', id), {
                                    method: 'PUT',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({
                                        estado: estado
                                    })
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error(
                                            'Hubo un problema al cambiar el estado.'
                                        );
                                    }
                                    // Actualizar la UI si lo necesitas
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        } else {
                            this.checked = !this.checked;
                        }
                    });
                });
            });
        });
    </script>
@stop
