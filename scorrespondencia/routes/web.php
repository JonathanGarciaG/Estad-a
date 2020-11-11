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

Route::get('/home', function () {
    return view('layout');
});

Route::get('/index', function () {
    return view('index');
});

//ruta retorna la vista de usuarios
Route::get('/usuariosv', function () {
    return view('contenido.usuarios');
});

//ruta retorna la vista de direcciones
Route::get('/direccionesv', function () {
    return view('contenido.direcciones');
});

//ruta retorna la vista de peticiones
Route::get('/peticionesv', function () {
    return view('contenido.peticionesv');
});

//rutas para controlador de personas
Route::apiResource('personas', 'PersonasController');
//Actualizar un registro especifico
Route::put('/personas', 'PersonasController@update');

//rutas para controlador de roles
Route::apiResource('roles', 'RolesController');
//Actualizar un registro especifico
Route::put('/roles', 'RolesController@update');

//rutas para controlador de usuarios
Route::apiResource('usuarios', 'UsuariosController');
//Actualizar un registro especifico
Route::put('/usuarios', 'UsuariosController@update');

//rutas para controlador de direcciones
Route::apiResource('usuarios', 'DireccionesController');
//Actualizar un registro especifico
Route::put('/usuarios', 'DireccionesController@update');



//para obtener la respuesta si se encuentra una sesion activa
Route::get('/sesion', 'UsuariosController@sesion');

//para obtener las imagenes de tu sitio
Route::get('/imagenes_sitioe', 'ImagenesSitioController@mysiteimgs');

//para obtener las imagenes de un sitio seleccionado
Route::get('/imagenes_sitioes/{id}', 'ImagenesSitioController@siteimgs');
