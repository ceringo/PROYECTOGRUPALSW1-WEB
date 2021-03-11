<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function () {
    return view('admin_template');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Moodulo Usuario
Route::resource('usuario/login', 'Usuario\\LoginController');
Route::resource('usuario/usuario-movil', 'Usuario\\UsuarioMovilController');
Route::resource('usuario/empleador', 'Usuario\\EmpleadorController');
Route::resource('usuario/empleado', 'Usuario\\EmpleadoController');
Route::resource('usuario/ubicacion', 'Usuario\\UbicacionController');

//Modulo Trabajo
Route::resource('trabajo/area', 'Trabajo\\AreaController');
Route::resource('trabajo/especialidad', 'Trabajo\\EspecialidadController');
Route::resource('trabajo/objeto', 'Trabajo\\ObjetoController');
Route::resource('trabajo/servicio', 'Trabajo\\ServicioController');
Route::resource('trabajo/solicitud-contrato', 'Trabajo\\SolicitudContratoController');

Route::resource('trabajo/contrato', 'Trabajo\\ContratoController');

//Modulo Respaldo
Route::resource('respaldo/solicitud-respaldo', 'Respaldo\\SolicitudRespaldoController');