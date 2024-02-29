<?php

use App\Http\Controllers\AsignarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\NodeController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/client', ClientController::class)->names('cliente');
    Route::resource('/roles', RoleController::class)->names('roles');
    Route::resource('/permisos', PermisoController::class)->names('permisos');
    Route::resource('/usuarios', AsignarController::class)->names('asignar');
    Route::resource('/nodos', NodeController::class)->names('nodos');
    Route::resource('/conexiones', ConnectionController::class)->names('conexiones');
    Route::resource('/mapa', MapController::class)->names('mapas');
    Route::resource('/emergencia', EmergencyController::class)->names('emergencias');
    Route::get('/emergencies/{id}/download', [EmergencyController::class, 'download']);
    Route::put('/cambiarEstado/{id}', [EmergencyController::class, 'cambiar_estado'])->name('cambiar_estado');
    Route::get('/descargar-plan', [EmergencyController::class, 'descargar_plan'])->name('descargar_plan');
});
