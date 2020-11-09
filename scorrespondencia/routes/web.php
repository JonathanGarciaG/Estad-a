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

Route::get('/usuarios', function () {
    return view('usuarios');
});

//rutas para controlador de personas
Route::apiResource('personas', 'PersonasController');
//Obtener datos de 1 registro especifico
Route::put('/personas', 'PersonasController@update');



//para obtener la respuesta si se encuentra una sesion activa
Route::get('/sesion', 'UsuariosController@sesion');

//para obtener las imagenes de tu sitio
Route::get('/imagenes_sitioe', 'ImagenesSitioController@mysiteimgs');

//para obtener las imagenes de un sitio seleccionado
Route::get('/imagenes_sitioes/{id}', 'ImagenesSitioController@siteimgs');
