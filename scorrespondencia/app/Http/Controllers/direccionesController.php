<?php

namespace App\Http\Controllers;

use App\direcciones;
use DB;
use Illuminate\Http\Request;

class direccionesController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla direcciones
    public function index(){
    	//se obtienen los registros de direcciones junto con los datos de persona que nos interesan
    	return DB::table('direcciones')->join('personas', 'direcciones.id_persona', '=', 'personas.id')->select('direcciones.*', 'personas.nombre as nombre_persona', 'personas.apellido_p', 'personas.apellido_m', 'personas.cargo', 'personas.ruta_foto')->get();
    }

    //metodo del controlador para agregar una dirección mediante un request recibido
    public function store(Request $request)
    {	
    	//Se toman los valores del request recibido
        $direccion = new direcciones();
        $direccion->nombre = $request->nombre;
        $direccion->id_persona = $request->id_persona;
       
        //se guardan los valores
        $direccion->save();
        //se retorna la dirección guardada
        return $direccion;
    }

    //Metodo para actualizar dirección
    public function update(Request $request){
        $direccion = direcciones::findOrFail($request->input('id'));
        //Guardando los nuevos valores de dirección
        $direccion->nombre = $request->nombre;
        $direccion->id_persona = $request->id_persona;

        $direccion->save();
    }

    public function show($id){
        $direccion = direcciones::find($id);
        return $direccion;
    }

    //metodo para eliminar registro de la tabla direcciones
    public function destroy($id)
    {
    	//se busca al direccion que se quiere eliminar
        $direccion = direcciones::find($id);
        $direccion->delete();
    }
}
