<?php

namespace App\Http\Controllers;

use App\roles;
use DB;
use Illuminate\Http\Request;

class rolesController extends Controller
{
    //funcion que retorna los valores de los registros de la tabla de roles
    public function index(){
        //se retornan los valores de los roles
    	return DB::table('roles')->get();
    }

    //metodo del controlador para agregar un usuario mediante un request recibido
    public function store(Request $request)
    {	
    	//se toman los valores del request realizado
        $rol = new roles();
        $rol->nombre = $request->nombre;
        $rol->save();
        //se retorna el rol guardado
        return $rol;
    }

    //Metodo para actualizar rol
    public function update(Request $request){
        $rol = roles::findOrFail($request->input('id'));
        //Guardando los nuevos valores del empleado
        $rol->nombre = $request->nombre;
        $rol->save();
    }

    public function show($id){
        $rol = roles::find($id);
        return $rol;
    }

    //metodo para eliminar registro de la tabla roles
    public function destroy($id)
    {
    	//se busca el rol que se quiere eliminar
        $rol = roles::find($id);
        $rol->delete();
    }
}
