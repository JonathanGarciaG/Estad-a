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
//rutas para login
Route::get('/', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/acceder', 'UsuariosController@acceder');


//rutas para vistas
Route::get('/home', function () {
    return view('layout');
});

Route::get('/index', function () {
    return view('index_admin');
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
    return view('contenido.peticiones');
});

//ruta retorna la vista de peticiones
Route::get('/peticionesfv', function () {
    return view('contenido.form_reporte');
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
Route::apiResource('direcciones', 'DireccionesController');
//Actualizar un registro especifico
Route::put('/direcciones', 'DireccionesController@update');

//rutas para controlador de servicios
Route::apiResource('servicios', 'ServiciosController');
//Actualizar un registro especifico
Route::put('/servicios', 'ServiciosController@update');
//Obtener los servicios de las direcciones
Route::get('/getservice/{id}', 'ServiciosController@getService');

//rutas para controlador de colonias
Route::apiResource('colonias', 'ColoniasController');
//Actualizar un registro especifico
Route::put('/colonias', 'ColoniasController@update');
//Obtener el cp de la colonia
Route::get('/getcp/{id}', 'ColoniasController@mostrarCP');

//rutas para controlador de prioridades
Route::apiResource('prioridades', 'PrioridadesController');
//Actualizar un registro especifico
Route::put('/prioridades', 'PrioridadesController@update');

//rutas para controlador de estados
Route::apiResource('solicitudes', 'SolicitudesController');
//Actualizar un registro especifico
Route::put('/solicitudes', 'SolicitudesController@update');
//Obtener la informacion de la solicitud
Route::get('/peticioninfo/{id}', 'SolicitudesController@peticionInfo');

//rutas para controlador de historiales
Route::apiResource('historiales', 'HistorialesController');
//Actualizar un registro especifico
Route::put('/historiales', 'HistorialesController@update');
//mostrar el estado mas reciente de la peticion
Route::get('/getestadopeticion/{id}', 'HistorialesController@getEstadoPeticion');
//mostrar el historial de estados
Route::get('/gethistorial/{id}', 'HistorialesController@getHistorial');

//rutas para controlador de estados
Route::apiResource('estados', 'EstadosController');
//Actualizar un registro especifico
Route::put('/estados', 'EstadosController@update');



//para obtener la respuesta si se encuentra una sesion activa
Route::get('/sesion', 'UsuariosController@sesion');

//para obtener las imagenes de tu sitio
Route::get('/imagenes_sitioe', 'ImagenesSitioController@mysiteimgs');

//para obtener las imagenes de un sitio seleccionado
Route::get('/imagenes_sitioes/{id}', 'ImagenesSitioController@siteimgs');
