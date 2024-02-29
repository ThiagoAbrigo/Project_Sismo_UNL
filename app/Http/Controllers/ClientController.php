<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Client::all();
        return view('sistema.listClient', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sistema.addClient');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'nombre' => 'required|string|max:75',
            'apellido' => 'required|string|max:75',
            'telefono' => 'required|numeric|min:10',
            'email' => 'required|email|unique:clients,email|max:75',
        ]);
        $cliente = new Client();
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');

        $cliente->save();
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
        $cliente = Client::find($id);
        return view('sistema.editClient', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Client::find($id);
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');

        $cliente->save();

        return back()->with('message', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Client::find($id);
        $cliente->delete();
        return back();
    }
}
