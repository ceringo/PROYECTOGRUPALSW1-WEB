<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Modulo Usuario 
Route::get('usuario/login', 'Api\LoginController@login');
Route::get('usuario/registro', 'Api\LoginController@registro');

//Modulo Trabajo
    //empleado
    
Route::get('trabajo/habilitaredeshabilitarempleado', 'Api\EmpleadoController@habilitarDeshabilitarEmpleado');
Route::get('trabajo/iabusqueda', 'Api\IaController@iaBusqueda');
Route::get('trabajo/serviciocomplemento', 'Api\EmpleadoController@servicioComplemento');
Route::get('trabajo/crearservicio', 'Api\EmpleadoController@crearServicio');
Route::get('trabajo/listamisservicios', 'Api\EmpleadoController@listarServicio');
Route::get('trabajo/desabilitarservicio', 'Api\EmpleadoController@desabilitarServicio');
Route::get('trabajo/alldesabilitarservicios', 'Api\EmpleadoController@allDesabilitarServicios');
Route::get('trabajo/listadesolicitudesparacontrato', 'Api\EmpleadoController@listaDeSolicitudesParaContrato');
Route::get('trabajo/listademiscontrato', 'Api\EmpleadoController@listaDeMisContrato');
Route::get('trabajo/finalizarcontrato', 'Api\EmpleadoController@finalizarContrato');


//falta programar
Route::get('trabajo/rechazarsolicitud', 'Api\EmpleadoController@rechazarSolicitud');


    






    //empleador
    
Route::get('trabajo/areasservicios', 'Api\EmpleadorController@areasServicios');
Route::get('trabajo/trabajadores', 'Api\EmpleadorController@trabajadores');
Route::get('trabajo/crearsolicitudcontrato', 'Api\EmpleadorController@crearSolicitudContrato');
Route::get('trabajo/contratar', 'Api\EmpleadorController@contratar');

Route::get('trabajo/listagenerica', 'Api\EmpleadorController@listaGenerica');

//falta programar
Route::get('trabajo/accionsolicitudcontrato', 'Api\EmpleadorController@accionSolicitudContrato');



//Otros Api
Route::get('trabajo/ubicacion', 'Api\IaController@ubicacion');



Route::get('trabajo/listadebaja', 'Api\EmpleadorController@listaDeBaja');
Route::get('trabajo/contratosrechazados', 'Api\EmpleadorController@contratosRechazados');














