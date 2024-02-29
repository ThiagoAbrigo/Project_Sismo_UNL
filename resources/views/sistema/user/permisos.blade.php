@extends('adminlte::page')

@section('title', 'Nodos')

@section('content_header')
    <h1 style="text-align: center"><strong>ADMINISTRACIÓN DE PERMISOS</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <x-adminlte-button label="Nuevo Permiso" theme="success" icon="fas fa-plus-circle" class="float-right"
                data-toggle="modal" data-target="#modalPurple" />
        </div>
        <div class="card-body">
            @php
                $heads = ['ID', 'Nombre', ['label' => 'Acciones', 'no-export' => true, 'width' => 10]];

                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
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
            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
                @foreach ($permisos as $permiso)
                    <tr>
                        <td>{{ $permiso->id }}</td>
                        <td>{{ $permiso->name }}</td>
                        <td>
                            <form style="display: inline" action="{{ route('permisos.destroy', $permiso) }}" method="POST"
                                class="formEliminar">
                                @csrf
                                @method('DELETE')
                                {!! $btnDelete !!}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
    {{-- Themed --}}
    <x-adminlte-modal id="modalPurple" title="Nuevo Permiso" theme="primary" icon="fa fa-key" size='lg'
        disable-animations>
        <form action="{{ route('permisos.store') }}" method="POST">
            @csrf
            <div class="row">
                <x-adminlte-input name="nombre" label="Nombre" placeholder="Nuevo permiso" fgroup-class="col-md-6"
                    disable-feedback />
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <x-adminlte-button type="submit" label="Guardar" theme="success" icon="fas fa-save" />
        </form>
    </x-adminlte-modal>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Estas seguro de eliminar un permiso?",
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

@stop
