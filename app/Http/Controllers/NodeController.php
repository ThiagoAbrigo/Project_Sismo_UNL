<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Node;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function __construct()
    // {
    //     $this->middleware('can: Crear Nodo')->only('create');
    // }
    public function index()
    {
        $nodos = Location::all();
        return view('sistema.nodes.index', compact('nodos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sistema.nodes.createNode');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'nombre' => 'required|string|max:75|unique:locations,name',
            'descripcion' => 'required|string|max:80',
            'latitud' => ['required', 'numeric', 'between:-90,90'],
            'longitud' => ['required', 'numeric', 'between:-180,180'],
            'tipo' => 'required',
        ]);
        $nodo = new Location();
        $nodo->name = $request->input('nombre');
        $nodo->description = $request->input('descripcion');
        $nodo->latitude = $request->input('latitud');
        $nodo->longitude = $request->input('longitud');
        $nodo->tipo_nodo = $request->input('tipo');

        $nodo->save();
        return back()->with('message', 'ok');
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
        $nodo = Location::find($id);
        return view('sistema.nodes.editNode', compact('nodo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validacion = $request->validate([
            'nombre' => 'required|string|max:75|unique:locations,name',
            'descripcion' => 'required|string|max:80',
            'latitud' => ['required', 'numeric', 'between:-90,90'],
            'longitud' => ['required', 'numeric', 'between:-180,180'],
            'tipo' => 'required',
        ]);
        $nodo = Location::find($id);
        $nodo->name = $request->input('nombre');
        $nodo->description = $request->input('descripcion');
        $nodo->latitude = $request->input('latitud');
        $nodo->longitude = $request->input('longitud');
        $nodo->tipo_nodo = $request->input('tipo');

        $nodo->save();
        return back()->with('message', 'Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nodo = Location::find($id);

        if ($nodo->tipo_nodo === 'destino') {
            return back()->with('error', 'No puedes aliminar esta zona segura');
        }
        $nodo->delete();
        return back();
    }
}
