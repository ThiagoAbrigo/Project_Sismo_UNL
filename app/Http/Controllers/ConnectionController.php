<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Connection;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        $connections = Connection::all();
        foreach ($connections as $connection) {
            $location1 = Location::find($connection->id_coordenada1);
            $location2 = Location::find($connection->id_coordenada2);

            // Añadir los nombres de las ubicaciones a las conexiones
            $connection->location1_name = $location1 ? $location1->name : 'Ubicación no encontrada';
            $connection->location2_name = $location2 ? $location2->name : 'Ubicación no encontrada';
        }
        return view('sistema.conexiones.index', compact('locations', 'connections'));
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
        // Validar los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [
            'location1' => 'required|exists:locations,id_coordenada',
            'location2' => 'required|exists:locations,id_coordenada',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $location1 = $request->input('location1');
        $location2 = $request->input('location2');

        // Verificar si la conexión ya existe en la base de datos
        $connectionExists = Connection::where(function ($query) use ($location1, $location2) {
            $query->where('id_coordenada1', $location1)
                ->where('id_coordenada2', $location2);
        })->orWhere(function ($query) use ($location1, $location2) {
            $query->where('id_coordenada1', $location2)
                ->where('id_coordenada2', $location1);
        })->exists();

        if ($connectionExists) {
            return response()->json(['error' => 'La conexión ya ha sido conectada previamente'], 400);
        }

        // Obtener las coordenadas de los nodos
        $coordinates = Location::whereIn('id_coordenada', [$location1, $location2])
            ->get(['latitude', 'longitude']);

        if ($coordinates->count() !== 2) {
            return response()->json(['error' => 'No se encontraron coordenadas para los nodos especificados'], 400);
        }
        // Calcular la distancia entre las coordenadas utilizando la fórmula de Haversine
        $distance = $this->haversineDistance(
            $coordinates[0]->latitude,
            $coordinates[0]->longitude,
            $coordinates[1]->latitude,
            $coordinates[1]->longitude
        );
        $distanceInMeters = $distance * 1000;
        // Guardar la conexión en la base de datos
        $connection = new Connection();
        $connection->id_coordenada1 = $location1;
        $connection->id_coordenada2 = $location2;
        $connection->distance = $distanceInMeters;
        $connection->save();
        return back()->with('message', 'Conexión guardada exitosamente');
    }

    // Función para calcular la distancia entre dos puntos utilizando la fórmula de Haversine
    private function haversineDistance($latitude1, $longitude1, $latitude2, $longitude2)
    {
        $earthRadius = 6371; // Radio de la Tierra en kilómetros

        // Convertir grados a radianes
        $latFrom = deg2rad($latitude1);
        $lonFrom = deg2rad($longitude1);
        $latTo = deg2rad($latitude2);
        $lonTo = deg2rad($longitude2);

        // Calcular la diferencia de longitud y latitud
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        // Calcular la distancia utilizando la fórmula de Haversine
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
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
        $connection = Connection::find($id);
        $connection->delete();
        return back();
    }
}
