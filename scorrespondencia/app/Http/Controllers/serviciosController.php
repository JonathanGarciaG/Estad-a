<?php

namespace App\Http\Controllers;

use App\servicios;
use DB;
use Illuminate\Http\Request;

class serviciosController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla servicios
    public function index(){
    	//se obtienen los registros de servicios junto con los datos de direccion que nos interesan
    	return DB::table('servicios')->join('direcciones', 'servicios.id_direccion', '=', 'direcciones.id')->select('servicios.*', 'direcciones.nombre as nombre_direccion')->get();
    }

    //metodo del controlador para agregar un servicio mediante un request recibido
    public function store(Request $request)
    {	
    	//Se toman los valores del request recibido
        $servicio = new servicios();
        $servicio->nombre = $request->nombre;
        $servicio->id_direccion = $request->id_direccion;
       
        //se guardan los valores
        $servicio->save();
        //se retorna la dirección guardada
        return $servicio;
    }

    //Metodo para actualizar servicio
    public function update(Request $request){
        $servicio = servicios::findOrFail($request->input('id'));
        //Guardando los nuevos valores de servicio
        $servicio->nombre = $request->nombre;
        $servicio->id_direccion = $request->id_direccion;

        $servicio->save();
    }

    public function show($id){
        $servicio = servicios::find($id);
        return $servicio;
    }

    //metodo para eliminar registro de la tabla servicios
    public function destroy($id)
    {
    	//se busca al servicio que se quiere eliminar
        $servicio = servicios::find($id);
        $servicio->delete();
    }

    //metodo para buscar los servicios de una direccion
    public function getService($id)
    {
        //se consultan los servicios
        return DB::table('servicios')->join('direcciones', 'servicios.id_direccion', '=', 'direcciones.id')->select('servicios.*')->where('servicios.id_direccion','=',$id)->get();
    }
}
