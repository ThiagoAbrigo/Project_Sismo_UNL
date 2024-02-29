<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Connection;
use App\Models\Location;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $connections = Connection::all();
        // Obtener los detalles de las coordenadas de los nodos de todas las conexiones
        foreach ($connections as $connection) {
            $origin = Location::find($connection->id_coordenada1);
            $destination = Location::find($connection->id_coordenada2);

            // Agregar las coordenadas de los nodos a la conexión
            $connection->origin_latitude = $origin->latitude;
            $connection->origin_longitude = $origin->longitude;
            $connection->origin_name = $origin->name;
            $connection->destination_latitude = $destination->latitude;
            $connection->destination_longitude = $destination->longitude;
            $connection->destination_name = $destination->name;
        }
        return view('sistema.maps.map', compact('connections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
