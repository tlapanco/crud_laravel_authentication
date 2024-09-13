<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\solicitudesController;
use App\Http\Controllers\AcademicosController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\asesores_industrialesController;
use App\Http\Controllers\EstanciasEstatusController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ReporteCompletadosController;


/**
 * Correr el siguiente comando en la consola para ver las rutas
 *
 * php artisan route:list
 */

Route::get('/', function () {
    return redirect()->route('empresas.index');
})->name('index')->middleware(['auth:root']);


/**
 * Auth biblioteca
 */
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:root');

/**
 * Documentacion de la Ruta y Controller resource
 *
 * https://laravel.com/docs/8.x/controllers#resource-controllers
 */

Route::resource('prueba', PruebaController::class)->except('show')->parameters([
    'prueba' => 'item'
    ])->middleware('auth:root');
Route::put('prueba/togglestatus/{item}', [PruebaController::class, 'toggleStatus'])->name('prueba.toggle.status')->middleware(['auth:root']);


Route::resource('estudiantes', EstudiantesController::class)->except('show')->parameters(['estudiantes' => 'estudiantes'])->middleware('auth:root');
Route::put('estudiantes/togglestatus/{estudiantes}', [EstudiantesController::class, 'toggleStatus'])->name('estudiantes.toggle.status')->middleware(['auth:root']);

Route::resource('solicitudes', solicitudesController::class)->except('show')->parameters(['solicitudes' => 'solicitudes'])->middleware('auth:root');
Route::put('solicitudes/togglestatus/{solicitudes}', [solicitudesController::class, 'toggleStatus'])->name('solicitudes.toggle.status')->middleware(['auth:root']);

Route::resource('asesores_academicos', AcademicosController::class)->except('show')->parameters(['asesores_academicos' => 'asesores_academicos'])->middleware('auth:root');
Route::put('asesores_academicos/togglestatus/{asesores_academicos}', [AcademicosController::class, 'toggleStatus'])->name('asesores_academicos.toggle.status')->middleware(['auth:root']);

Route::resource('empresas', EmpresasController::class)->except('show')->parameters(['empresas' => 'empresas'])->middleware('auth:root');
Route::put('empresas/togglestatus/{empresas}', [EmpresasController::class, 'toggleStatus'])->name('empresas.toggle.status')->middleware(['auth:root']);

Route::resource('asesores_industriales', asesores_industrialesController::class)->except('show')->parameters(['asesores_industriales' => 'asesores_industriales'])->middleware('auth:root');
Route::put('asesores_industriales/togglestatus/{asesores_industriales}', [asesores_industrialesController::class, 'toggleStatus'])->name('asesores_industriales.toggle.status')->middleware(['auth:root']);


//Estancias estatus rutas inicio


Route::resource('estatus', EstanciasEstatusController::class)->except('show')->parameters(['estatus' => 'estatus', 'solicitudes' => 'solicitudes'])->middleware('auth:root');

//Estancias estatus rutas fin



//Solicitudes pendientes: rutas inicio

Route::get('consulta', [ReporteController::class, 'consulta'])->name('consulta')->middleware('auth:root');

Route::get('contenido/', [ReporteController::class, 'contenido'])->name('contenido')->middleware('auth:root');

Route::get('detalle_carreras/{id}/{idce}/{idp}',[ReporteController::class, 'detalle_carreras'])->name('detalle_carreras')->middleware('auth:root');

Route::get('regresar/{idce}/{idp}', [ReporteController::class, 'regresar'])->name('regresar')->middleware('auth:root');

Route::get('detalle_solicitudes/{id}/{idp}/{idce}/{idca}',[ReporteController::class, 'detalle_solicitudes'])->name('detalle_solicitudes')->middleware('auth:root');
Route::get('detalle_cartas/{id}/{idp}/{idce}/{idca}',[ReporteController::class, 'detalle_cartas'])->name('detalle_cartas')->middleware('auth:root');

//Solicitudes pendientes: rutas fin



//Solicitudes completadas: rutas inicio


Route::get('consulta_completadas', [ReporteCompletadosController::class, 'consulta_completadas'])->name('consulta_completadas')->middleware('auth:root');
Route::get('contenido_completadas/', [ReporteCompletadosController::class, 'contenido_completadas'])->name('contenido_completadas')->middleware('auth:root');

Route::get('detalle_carreras_completadas/{id}/{idce}/{idp}',[ReporteCompletadosController::class, 'detalle_carreras_completadas'])->name('detalle_carreras_completadas')->middleware('auth:root');

Route::get('regresar_completadas/{idce}/{idp}', [ReporteCompletadosController::class, 'regresar_completadas'])->name('regresar_completadas')->middleware('auth:root');

Route::get('detalle_solicitudes_completadas/{id}/{idp}/{idce}/{idca}',[ReporteCompletadosController::class, 'detalle_solicitudes_completadas'])->name('detalle_solicitudes_completadas')->middleware('auth:root');

Route::get('detalle_cartas_completadas/{id}/{idp}/{idce}/{idca}',[ReporteCompletadosController::class, 'detalle_cartas_completadas'])->name('detalle_cartas_completadas')->middleware('auth:root');

//Solicitudes completadas: rutas fin






Route::get('usuario/perfil', [AdminController::class, 'perfil'])->middleware('auth:root')->name('perfil');
Route::put('updatepassword/{id}', [AdminController::class, 'updatepassword'])->name('updatepassword');
Route::put('updatefoto/{id}', [AdminController::class, 'updatefoto'])->name('updatefoto');
