<?php

namespace App\Http\Controllers;

use App\prioridades;
use DB;
use Illuminate\Http\Request;

class prioridadesController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla de prioridades
    public function index(){
        //se retornan los valores de las prioridades
    	return DB::table('prioridades')->get();
    }

    //metodo para agregar un usuario mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request recibido
        $prioridad = new prioridades();
        $prioridad->nombre = $request->nombre;
        $prioridad->save();
        //se retorna la prioridad guardada
        return $prioridad;
    }

    //Metodo para actualizar prioridad
    public function update(Request $request){
        $prioridad = prioridades::findOrFail($request->input('id'));
        //Guardando los nuevos valores del empleado
        $prioridad->nombre = $request->nombre;
        $prioridad->save();
    }

    public function show($id){
        $prioridad = prioridades::find($id);
        return $prioridad;
    }

    //metodo para eliminar registro de la tabla prioridades
    public function destroy($id)
    {
    	//se busca el prioridad que se quiere eliminar
        $prioridad = prioridades::find($id);
        $prioridad->delete();
    }
}
