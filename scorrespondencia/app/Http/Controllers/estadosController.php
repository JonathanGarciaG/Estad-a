<?php

namespace App\Http\Controllers;

use App\estados;
use DB;
use Illuminate\Http\Request;

class estadosController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla estados
    public function index(){
        //se retornan los valores de los registros de la tabla estados
    	return DB::table('estados')->get();
    }

    //metodo del controlador para agregar un registro de estados mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request recibido
        $estado = new estados();
        $estado->nombre = $request->nombre;
        
        //se guardan los valores
        $estado->save();
        //se retorna la estados guardado
        return $estado;
    }

    //Metodo para actualizar estados
    public function update(Request $request){
        $estado = estados::findOrFail($request->input('id'));
        //Guardando los nuevos valores del empleado
        $estado->nombre = $request->nombre;

        $estados->save();
    }

    public function show($id){
        $estados = estados::find($id);
        return $estados;
    }

    //metodo para eliminar registro de la tabla estados
    public function destroy($id)
    {
    	//se busca a la estados que se quiere eliminar
        $estados = estados::find($id);
        $estados->delete();
    }
}
