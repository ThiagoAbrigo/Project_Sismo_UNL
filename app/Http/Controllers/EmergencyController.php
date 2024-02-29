<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Emergency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmergencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emergencias = Emergency::all();
        return view('sistema.emergencias.emergencia', compact('emergencias'));
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
        $request->validate([
            'titulo' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        // Obtener el archivo enviado
        $file = $request->file('file');

        $fileName = time() . '_' . $file->getClientOriginalName();

        $file->storeAs('public/pdf', $fileName);

        $emergencia = new Emergency();

        $emergencia->titulo = $request->titulo;
        $emergencia->file = $fileName;
        $emergencia->estado = 'inactivo';


        $emergencia->save();
        return redirect()->back();
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
        $emergencia = Emergency::find($id);
        $emergencia->delete();
        return back();
    }
    public function download($id)
    {
        $emergency = Emergency::find($id);
        if (!$emergency) {
            return redirect()->back()->with('error', 'Archivo no encontrado.');
        }
        $filePath = storage_path('app/public/pdf/' . $emergency->file);
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'El archivo no existe en el servidor.');
        }
    }
    public function cambiar_estado(Request $request, $id)
    {
        // Validar la solicitud
        $request->validate([
            'estado' => 'required|in:activo,inactivo',
        ]);

        // Encontrar el modelo por su ID
        $modelo = Emergency::findOrFail($id);

        // Actualizar el estado
        $modelo->estado = $request->estado;
        $modelo->save();

        // Responder con un mensaje de éxito
        return response()->json(['message' => 'Estado actualizado correctamente.']);
    }
    public function descargar_plan()
    {
        // Obtener el plan de emergencia activo
        $emergencia = Emergency::where('estado', 'activo')->first();

        // Verificar si hay un plan de emergencia activo
        if ($emergencia) {
            // Descargar el archivo
            $filePath = storage_path('app/public/pdf/') . $emergencia->file;
            return response()->download($filePath, $emergencia->titulo . '.pdf');
        } else {
            // Si no hay un plan de emergencia activo, redirigir o mostrar un mensaje de error
            return redirect()->back()->with('error', 'No hay un plan de emergencia activo disponible para descargar.');
        }
    }
}
