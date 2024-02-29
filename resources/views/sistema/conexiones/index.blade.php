@extends('adminlte::page')

@section('title', 'Nodos')

@section('content_header')
    <h1 style="text-align: center"><strong>CONEXIONES</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <Form action="{{ route('conexiones.store') }}" method="POST">
                @csrf
                <label for="location1">Nodo 1</label>
                <x-adminlte-select2 name="location1" id="location1">
                    @foreach ($locations as $location)
                        <option value="{{ $location->id_coordenada }}">{{ $location->name }}</option>
                    @endforeach
                </x-adminlte-select2>
                <label for="location2">Nodo 2</label>
                <x-adminlte-select2 name="location2" id="location2">
                    @foreach ($locations as $location)
                        <option value="{{ $location->id_coordenada }}">{{ $location->name }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar Conexión" theme="success"
                    icon="fas fa-lg fa-save" />
            </Form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @php
                $heads = [['label' => '#', 'width' => 20], ['label' => 'Coordenada 1', 'width' => 20], ['label' => 'Enlace', 'width' => 20], ['label' => 'Coordenada 2', 'width' => 20], ['label' => 'Distancia', 'width' => 20], ['label' => 'Actions', 'no-export' => true, 'width' => 10]];

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
                @foreach ($connections as $connection)
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{{ $connection->id_connection }}</td>
                        <td>{{ $connection->location1_name }}</td>
                        <td style="text-align: center; vertical-align: middle;"><i class="fas fa-arrow-right"></i></td>
                        <td>{{ $connection->location2_name }}</td>
                        <td>{{ $connection->distance }}</td>
                        <td style="text-align: center; vertical-align: middle;">
                            <form style="display: inline" action="{{ route('conexiones.destroy', $connection) }}"
                                method="POST" class="formEliminar">
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        @if (session('message'))
            <
            script >
                $(document).ready(function() {
                    let mensaje = "{{ session('message') }}";
                    Swal.fire({
                        'title': 'Conexión Creada',
                        'text': mensaje,
                        'icon': 'success'
                    })
                })
        @endif
    </script>
    <script>
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Estas seguro de eliminar una conexión?",
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
