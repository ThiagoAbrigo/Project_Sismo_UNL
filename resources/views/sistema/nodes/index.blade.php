@extends('adminlte::page')

@section('title', 'Nodos')

@section('content_header')
    <h1 style="text-align: center"><strong>LISTA DE NODOS</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-head">
            <a href="{{ route('nodos.create') }}" class="btn btn-success float-right mt-2 mr-4 "><i
                    class="fas fa-plus-circle"></i> Nuevo
                Nodo</a>
        </div>
        <div class="card-body">
            @php
                $heads = ['ID', 'Nombre', 'Descripcion', 'Latitude', ['label' => 'longitude', 'width' => 10], ['label' => 'Tipo', 'width' => 10], ['label' => 'Actions', 'no-export' => true, 'width' => 10]];

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
            <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                bordered compressed>
                @foreach ($nodos as $nodo)
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{{ $nodo->id_coordenada }}</td>
                        <td>{{ $nodo->name }}</td>
                        <td>{{ $nodo->description }}</td>
                        <td>{{ $nodo->latitude }}</td>
                        <td>{{ $nodo->longitude }}</td>
                        <td>{{ $nodo->tipo_nodo }}</td>
                        <td style="text-align: center; vertical-align: middle;"><a href="{{ route('nodos.edit', $nodo) }}"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            @if ($nodo->tipo_nodo !== 'destino')
                                <form style="display: inline" action="{{ route('nodos.destroy', $nodo) }}" method="POST"
                                    class="formEliminar">
                                    @csrf
                                    @method('DELETE')
                                    {!! $btnDelete !!}
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
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
                    title: "Estas seguro de eliminar un nodo?",
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
